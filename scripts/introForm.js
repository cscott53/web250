let name = document.getElementById('name'),
    personalBackground = document.getElementById('pBack'),
    academicBackground = document.getElementById('aBack'),
    profBackground = document.getElementById('prBack'),
    bkgdInSubj = document.getElementById('bkgdInSubj'),
    primPlatform = document.getElementById('pPlat'),
    funnyItem = document.getElementById('funnyItem'),
    alsoShare = document.getElementById('alsoShare'),
    submit = document.getElementById('submit'),
    formItems = Array.from(document.querySelectorAll('.formrow,fieldset')),
    main = document.querySelector('main'),
    img = document.getElementById('img'),
    caption = document.getElementById('caption');
function updatePage(image) {
    let date = new Date,
        dateStr = `${date.getMonth()+1}/${date.getDate()}/${date.getFullYear()}`;
    main.innerHTML=`<h2>Introduction</h2>
    <p>I understand that what I put here is publicly available on the web and I won't put anything here I don't want the public to see - ${name.value} ${dateStr}</p>
    <figure>
        ${image.outerHTML}
        <figcaption>${caption.value}</figcaption>
    </figure>`;
    let list = document.createElement('ul');
    main.appendChild(list);
    formItems.shift();
    for (var item of formItems) {
        if (item.contains(img) || item.contains(caption))
            continue;
        let li = document.createElement('li');
        list.appendChild(li);
        if (item.className === 'formrow') {
            let formLabel = item.querySelector('label'),
                label = formLabel.textContent,
                value = item.querySelector('input,textarea').value,
                labelFor = formLabel.getAttribute('for');
            if (labelFor !== 'alsoShare') li.innerHTML = `<strong>${label}</strong> ${value}`;
            else {
                li.innerHTML = `<strong>${label}</strong>`;
                let listItem = document.createElement('ul');
                for (let i of value.split('\n')) {
                    if (i.trim() === '') continue;
                    let bulletPoint = document.createElement('li');
                    bulletPoint.innerHTML = i;
                    listItem.appendChild(bulletPoint);
                }
                li.appendChild(listItem);
            }
        } else {
            let legend = item.querySelector('legend').textContent,
                courses = document.createElement('ul');
            li.innerHTML = `<strong>${legend}</strong>`;
            for (let c of item.querySelectorAll('.course')) {
                let [course,reason]=[...c.querySelectorAll('input,textarea')].map((e) => e.value);
                let listItem = document.createElement('li');
                listItem.innerHTML = `${course} - ${reason}`;
                courses.appendChild(listItem);
            }
            li.appendChild(courses);
        }
    }
}
submit.onclick=() => {
    let image = new Image;
    if (img.files.length > 0) {
        let reader = new FileReader;
        reader.onload=(e) => {
            image.src=e.target.result;
            updatePage(image);
        };
        reader.readAsDataURL(img.files[0]);
    } else {
        image.src = 'images/verse.png';
        updatePage(image);
    }
};
function delRow(e) {
    let row=e.parentElement;
    row.parentElement.removeChild(row);
}
document.querySelectorAll('.course button').forEach((e) => e.onclick=() => delRow(e));
let addBtn = document.getElementById('addCourse');
addBtn.onclick=() => {
    let row = document.createElement('div');
    row.className='course';
    let course = document.createElement('input');
    let reason = document.createElement('textarea');
    let delBtn = document.createElement('button');
    delBtn.className='imgBtn';
    let img = new Image;
    img.src = 'images/del.svg';
    delBtn.appendChild(img);
    delBtn.onclick=() => delRow(delBtn);
    row.append(course,reason,delBtn);
    course.placeholder='Course';
    reason.placeholder='Reason';
    addBtn.insertAdjacentElement('beforebegin',row);
};