document.addEventListener('DOMContentLoaded', function () {
    const addIngredientButton = document.getElementById('add_ingrediente');
    const IngredientListSection = document.getElementById('Ingredient_List');
    
    // Tomamos como plantilla el primer bloque
    const inputIngredient = document.querySelector('.Ingrediente');

    function addRemoveHandler(block) {
        const removeBtn = block.querySelector('.remove_ingrediente');
        removeBtn.addEventListener('click', function () {
            block.remove();
        });
    }

    // Aplica el handler a todos los que ya están en el DOM
    document.querySelectorAll('.Ingrediente').forEach(addRemoveHandler);

    addIngredientButton.addEventListener('click', function () {
        const clone = inputIngredient.cloneNode(true);
        clone.querySelector('input').value = ''; // Limpia el valor
        addRemoveHandler(clone);
        IngredientListSection.insertBefore(clone, addIngredientButton);
    });
});