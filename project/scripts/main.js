function expireInHours(hour) {
    let date = new Date();
    date.setHours(date.getHours() + hour);
    return date.toUTCString();
}
let prevRow;
function editBtn(e) {
    let row = e.parentElement.parentElement;
    prevRow = row.cloneNode(true);
    for (let i = 1; i < row.children.length-1; i++) {
        let type = isNaN(parseFloat(row.children[i].innerText)) ? 'text' : 'number';
        row.children[i].innerHTML = `<input type="${type}" value="${row.children[i].innerText}">`;
    }
    row.children[row.children.length-1].innerHTML = `<button class="save" onclick="saveBtn(this,'edit')"><img src="images/save.svg" alt="Save"></button>
    <button class="cancel" onclick="cancelBtn(this,'edit')"><img src="images/cancel.svg" alt="Cancel"></button>`;
}
function saveBtn(e,type) {
    let row = e.parentElement.parentElement;
    let [id,name,quantity,price] = [...row.children].map((e) => {
        if (e.children[0]&&e.children[0].value !== undefined) return e.children[0].value;
        return e.innerText;
    });
    for (let i = 1; i < row.children.length-1; i++) {
        row.children[i].innerHTML = row.children[i].children[0].value;
    }
    row.children[row.children.length-1].innerHTML = `<button class="edit" onclick="editBtn(this)"><img src="images/edit.svg" alt="Edit"></button>
    <button class="delete" onclick="delBtn(this)"><img src="images/del.svg" alt="Delete"></button>`;
    HTTPRequest.post('crud.php', {id, name, quantity, price, action: type}, (res) => {
        res.json().then((data) => {
            if (!data.success)
                alert('Error updating:\n' + data.error);
        }).catch((err) =>
            alert('Error updating: ' + err)
        );
    }, {'Content-Type': contentType.json})
}
function delBtn(e) {
    let row = e.parentElement.parentElement;
    let id = row.children[0].innerText;
    if (!confirm('Are you sure you want to delete this item?')) return;
    HTTPRequest.post('crud.php', {id, action: 'del'}, (res) => {
        res.json().then((data) => {
            if (data.success) row.remove();
            else alert('Error deleting:\n' + data.error);
        }).catch((err) =>
            alert('Error deleting: ' + err)
        );
    }, {'Content-Type': contentType.json});
}
function randChar() {
    return Math.floor(Math.random() * 36).toString(36);
}
function randId() {
    let id = '';
    for (let i = 0; i < 5; i++)
        id += randChar();
    return id;
}
document.getElementById('add') && 
(document.getElementById('add').onclick = () => {
    let table = document.querySelector('table');
    let ids = [...table.querySelectorAll('tr td:first-child')].map((e) => e.innerText);
    let row = table.insertRow(table.rows.length);
    let id = randId();
    while (ids.includes(id)) {
        id = randId();
    }
    row.innerHTML = `<td class='id'>${id}</td>
    <td class='name'><input type="text"></td>
    <td class='quantity'><input type="number"></td>
    <td class='price'><input type="number"></td>
    <td class='actions'>
        <button class="save" onclick="saveBtn(this,'add')"><img src="images/save.svg" alt="Save"></button>
        <button class="cancel" onclick="cancelBtn(this,'add')"><img src="images/cancel.svg" alt="Cancel"></button>
    </td>`;
});
function cancelBtn(e,type) {
    let row = e.parentElement.parentElement;
    if (type === 'add') {
        row.remove();
    } else {
        row.innerHTML = prevRow.innerHTML;
    }
}