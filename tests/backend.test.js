const fs = require("fs");
const path = require("path");

// Funções unitárias de regra de negócio do cadastro
function validarEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(String(email).toLowerCase());
}

function validarSenha(senha) {
  return typeof senha === "string" && senha.length >= 6;
}

function sanitizarEntrada(texto) {
  return String(texto).trim().replace(/[<>]/g, "");
}

describe("Testes Unitários de Backend e Regras de Negócio", () => {
  test("deve conter processamento PHP válido no index.php", () => {
    const phpCode = fs.readFileSync(path.join(__dirname, "../index.php"), "utf8");
    expect(phpCode).toContain("<?php");
    expect(phpCode).toMatch(/\$_POST|\$_SERVER/);
  });

  test("deve validar formatos de e-mail corretamente", () => {
    expect(validarEmail("anael@uern.br")).toBe(true);
    expect(validarEmail("email-invalido")).toBe(false);
    expect(validarEmail("")).toBe(false);
  });

  test("deve exigir senha com no mínimo 6 caracteres", () => {
    expect(validarSenha("123456")).toBe(true);
    expect(validarSenha("123")).toBe(false);
  });

  test("deve sanitizar caracteres perigosos contra XSS", () => {
    expect(sanitizarEntrada("  <script>Anael</script>  ")).toBe("scriptAnael/script");
  });
});
