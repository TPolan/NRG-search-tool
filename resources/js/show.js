let singleRow = document.getElementById('single_result');
let deleteButton = document.getElementById('delete');
const table = document.getElementById('table');


document.addEventListener('DOMContentLoaded', () => {
    deleteButton.addEventListener('click', () => (
        table.removeChild(singleRow)
    ));
});
