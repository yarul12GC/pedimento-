// Función para agregar una nueva sección
document.getElementById("add-section").addEventListener("click", function () {
  const form = document.createElement("form");
  form.method = "POST";

  const input = document.createElement("input");
  input.type = "hidden";
  input.name = "add_section";
  input.value = "1";
  form.appendChild(input);

  document.body.appendChild(form);
  form.submit();
});

// Función para guardar una sección
document.querySelectorAll(".save-section").forEach((button) => {
  button.addEventListener("click", function () {
    const index = this.getAttribute("data-index");
    const form = document.createElement("form");
    form.method = "POST";

    // Lista de campos que quieres enviar como datos ocultos
    const fields = [
      "fraccionA",
      "nico",
      "vinc",
      "metval",
      "umc",
      "cantumc",
      "umt",
      "cant",
      "idapendice4",
      "pod",
      "idpedimentoc"
    ];

    // Agregar los campos al formulario
    fields.forEach((field) => {
      const input = document.createElement("input");
      input.type = "hidden";
      input.name = field;
      input.value = document.querySelector(`[name="${field}[${index}]"]`).value;
      form.appendChild(input);
    });

    // Agregar el índice de la sección
    const indexInput = document.createElement("input");
    indexInput.type = "hidden";
    indexInput.name = "index";
    indexInput.value = index;
    form.appendChild(indexInput);

    // Agregar el campo para guardar la sección
    const saveInput = document.createElement("input");
    saveInput.type = "hidden";
    saveInput.name = "save_section";
    saveInput.value = "1";
    form.appendChild(saveInput);

    document.body.appendChild(form);
    form.submit();
  });
});

// Función para guardar los formularios adicionales
document.querySelectorAll(".save-additional").forEach((button) => {
  button.addEventListener("click", function () {
    const index = this.getAttribute("data-index");
    const formId = this.getAttribute("data-form-id");
    const form = document.getElementById(formId);

    form.querySelectorAll("input").forEach((input) => {
      const hiddenInput = document.createElement("input");
      hiddenInput.type = "hidden";
      hiddenInput.name = input.name;
      hiddenInput.value = input.value;
      form.appendChild(hiddenInput);
    });

    form.submit();
  });
});