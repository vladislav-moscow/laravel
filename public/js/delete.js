document.addEventListener("DOMContentLoaded", function () {
    const elem = document.querySelectorAll('.delete');
    elem.forEach(function (el, index) {
        el.addEventListener('click', function () {
            console.log(`нажата кнопка с ${index}`)
            const id = this.getAttribute("rel");
            if(confirm(`Потвердите удаление записи с #ID ${id} ?`)) {
                send(`/admin/news/${id}`).then(() => {
                    alert("Запись была удалена");
                    location.reload();
                });
            }
        });
    });

    const elemCategory = document.querySelectorAll('.delete__category');
    elemCategory.forEach(function (el, index) {
        el.addEventListener('click', function () {
            console.log(`нажата кнопка с ${index}`)
            const id = this.getAttribute("rel");
            if(confirm(`Потвердите удаление записи с #ID ${id} ?`)) {
                send(`/admin/categories/${id}`).then(() => {
                    alert("Запись была удалена");
                    location.reload();
                });
            }
        });
    });
});

async function send(url) {
    let response = await  fetch(url, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                .getAttribute('content')
        }
    });
    let result = await response.json();
    return result.ok;
}
