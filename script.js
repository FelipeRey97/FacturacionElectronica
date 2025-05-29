document.getElementById("start-button").addEventListener("click", function () {
  document.querySelector(".initial-screen").style.display = "none";
  document.getElementById("invoice-container").style.display = "block";
});

document
  .getElementById("invoice-form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Prevenir el envío del formulario

    // Crear un nuevo PDF
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Obtener los datos del formulario
    const businessName = document.getElementById("business-name").value;
    const customerName = document.getElementById("customer-name").value;
    const amount = document.getElementById("amount").value;

    // Datos de la factura
    const invoiceDetails = `
          Datos de la Factura:
          Fecha de Factura: ${new Date().toLocaleDateString()}
          Número de Factura: 2024-0001
          Fecha de Vencimiento: ${new Date(
            new Date().setMonth(new Date().getMonth() + 1)
          ).toLocaleDateString()}
          
          Datos del Cliente:
          Nombre: ${customerName}
          
          Datos de la Empresa:
          Nombre: ${businessName}
          
          Detalle de Productos:
          Descripción   Unidades   Precio Unitario   Precio
          Producto 1    2          €100             €200
          Producto 2    4          €150             €600
          Producto 3    7          €93              €651
          
          Totales:
          Base Imponible: €1,451
          IVA (21%): €304.71
          IRPF (15%): -€217.65
          Total a Pagar: €1,538.06
      `;

    // Agregar el contenido al PDF
    doc.text(invoiceDetails, 10, 10);

    // Descargar el PDF
    doc.save("factura.pdf");
  });
