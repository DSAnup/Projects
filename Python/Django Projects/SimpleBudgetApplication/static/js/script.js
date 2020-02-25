
document.getElementById("categoryInput").addEventListener("keydown", function(e){
        if (e.keyCode != 13){
            return;
        }
        e.preventDefault()
        var categoryName = this.value
        this.value = ''
        addNewCategory(categoryName)
        updateCategoriesString()
});
function addNewCategory(name){
    var h = document.getElementById("categoriesContainer");
    h.insertAdjacentHTML("beforeend", `
        <li class="category">
            <span class="name">${name}</span>
            <span onclick="removeCategory(this)" class="btnRemove bold">x</span>
        </li>
  `);
}

function updateCategoriesString(){
var categories = []
    document.querySelectorAll('.category').forEach(function(e){
        name = e.querySelector('.name').innerHTML
        if (name == '') return;
        categories.push(name)
    })
    document.querySelector('input[name = "categoriesString"]').value = categories.join(',')
}

function removeCategory(e){
    e.parentElement.remove()
    updateCategoriesString()
}