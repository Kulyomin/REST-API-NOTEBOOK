//Создаём ассинхронный метод получения JSON поста после получения данных с помощью fetch
async function getPosts() {
   // let res = await fetch('https://jsonplaceholder.typicode.com/posts');
   let res = await fetch('http://api/posts');
   let posts = await res.json(); // Преобразование полученных данных в JSON формат

   document.querySelector('.post-list').innerHTML = '';

   posts.forEach((post) => {
      document.querySelector('.post-list').innerHTML += `
      <div class="card">
         <div class="card-body">
            <h5 class="card-title">${post.surname} ${post.name} ${post.mdname}</h5>
            <p class="card-text">${post.number} ${post.company} ${post.email}</p>
            <a href="#" class="card-link">Подробнее</a>
            <a href="#" class="card-link" onclick="removePost(${post.id})">Удалить</a>
         </div>
    </div>`
   });
}

async function addPost() {
   const name = document.getElementById('name').value,
   surname = document.getElementById('surname').value,
   company = document.getElementById('company').value,
   mdname = document.getElementById('mdname').value,
   number = document.getElementById('number').value,
   email = document.getElementById('email').value;

   // Простая проверка на введенные данные
   if( name.length || surname.length || mdname.length || number.length || email.length == 0){
         alert('Введены не все данные!(ФИО, Номер, Почта)');
      return;
   }

   let formData = new FormData();
   formData.append('name', name);
   formData.append('surname', surname);
   formData.append('mdname', mdname);
   formData.append('company', company);
   formData.append('number', number);
   formData.append('email', email);
   formData.append('date', date);

   const res = await fetch('http://api/posts', {
      method: 'POST',
      body: formData
   });

   const data = await res.json();

   if(data.status === true) {
      await getPosts();
   }
}

async function removePost(Id) {
   const res = await fetch(`http://api/posts/${Id}`, {
      method: "DELETE"
   });

   const data = await res.json();

   if(data.status === true) {
      await getPosts();
   }
}

getPosts();