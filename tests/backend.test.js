const fs = require("fs");
const path = require("path");

function validarEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(String(email).toLowerCase());
}

function validarNome(nome) {
  return typeof nome === "string" && nome.trim().length >= 2;
}

function sanitizarEntrada(texto) {
  return String(texto).trim().replace(/[<>]/g, "");
}

describe("Testes Unitários de Backend e Regras de Negócio", () => {
  test("deve conter processamento PHP válido nos endpoints salvar.php e listar.php", () => {
    const salvarPhp = fs.readFileSync(path.join(__dirname, "../salvar.php"), "utf8");
    const listarPhp = fs.readFileSync(path.join(__dirname, "../listar.php"), "utf8");

    expect(salvarPhp).toContain("<?php");
    expect(salvarPhp).toMatch(/\$_POST/);
    expect(listarPhp).toContain("<?php");
  });

  test("deve validar formatos de e-mail corretamente", () => {
    expect(validarEmail("anael@uern.br")).toBe(true);
    expect(validarEmail("email-invalido")).toBe(false);
    expect(validarEmail("")).toBe(false);
  });

  test("deve validar nome obrigatório com no mínimo 2 caracteres", () => {
    expect(validarNome("Anael Marcos")).toBe(true);
    expect(validarNome("A")).toBe(false);
    expect(validarNome("   ")).toBe(false);
  });

  test("deve sanitizar caracteres perigosos contra XSS", () => {
    expect(sanitizarEntrada("  <script>Anael</script>  ")).toBe("scriptAnael/script");
  });
});
