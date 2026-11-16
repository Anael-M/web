const fs = require("fs");
const path = require("path");

const html = fs.readFileSync(
  path.join(__dirname, "../index.php"),
  "utf8"
);

describe("Validação da Interface de Cadastro (index.php)", () => {
  beforeEach(() => {
    document.documentElement.innerHTML = html;
  });

  test("deve renderizar o formulário de cadastro corretamente", () => {
    const form = document.querySelector("form");
    expect(form).not.toBeNull();
    expect(form.getAttribute("method")?.toUpperCase()).toBe("POST");
  });

  test("deve conter os campos obrigatórios de entrada", () => {
    const inputs = document.querySelectorAll("form input");
    expect(inputs.length).toBeGreaterThan(0);

    const emailInput = document.querySelector('input[type="email"]');
    if (emailInput) {
      expect(emailInput.hasAttribute("required")).toBe(true);
    }
  });

  test("deve possuir um botão de envio (submit)", () => {
    const submitBtn = document.querySelector('button[type="submit"], input[type="submit"]');
    expect(submitBtn).not.toBeNull();
  });
});
