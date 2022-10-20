<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/products/index">
                        <button class="btn btn-sm btn-secondary" type="button">Назад</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <section>
        <div class="my-form">
            <form action=<?= '/products/edit/?id='.$_GET['id'] ?> class="form" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Пожалуйста введите данные</h1>
                <div class="input-wrapper">
                        <input type="text" name="inputName" class="form-control" placeholder="Name" required=""
                               autofocus="" value=<?= $_GET['name'] ?>>
                </div>
                <div class="input-wrapper">
                        <input type="text" name="inputImage" class="form-control" placeholder="Image" required="" value=<?= $_GET['image'] ?>>
                </div>
                <div class="input-wrapper">
                        <input type="number" name="inputPrice" class="form-control" placeholder="Price" required="" value=<?= $_GET['price'] ?>>
                </div>
                <div class="input-wrapper">
                        <input type="text" name="inputDescription" class="form-control" placeholder="Description"
                               required="" value=<?= $_GET['description'] ?>>
                </div>
                <div class="input-wrapper">
                        <input type="number" name="inputStyleId" class="form-control" placeholder="Style id"
                               required="" value=<?= $_GET['style_id'] ?>>
                </div>
                <div class="button-wrapper">
                    <button class="btn btn-lg btn-primary" type="submit">Обновить</button>
                </div>
            </form>
        </div>
    </section>
</main>

