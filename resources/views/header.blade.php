<header class="header">
    <div class="container">
        <a href="{{route("home")}}" class="logo">Logo</a>
        <div class="flex-row">
            <button class="btn">
                Вход
            </button>
            <button class="btn">
                Регистрация
            </button>
            <button class="btn">
                Избранные книги
            </button>
        </div>
    </div>

    <div class="modal-bc">
        <div class="card">
            <h3>Вы уверены что хотите удалить?</h3>
            <div class="flex-row">
                <a href="#" class="btn red" id="deleteBtn">Да</a>
                <button class="btn" onclick="closeModal()" id="outBtn">Выйти</button>
            </div>
        </div>
    </div>

    <script>
        const modalBody = document.querySelector('.modal-bc');
        const outBtn = document.querySelector('#outBtn');
        const deleteBtn = document.querySelector('#deleteBtn');

        function openModal(route, id) {
            deleteBtn.href = window.location.origin + route + id;

            modalBody.classList.add('active');
        }

        function closeModal() {
            modalBody.classList.remove('active');
        }

    </script>
</header>
