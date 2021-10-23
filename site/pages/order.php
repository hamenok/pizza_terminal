<article>
    <div class="card">
        <div class="card-header">
            Заказ пиццы
        </div>
        <div class="card-body">
            <form class="row g-3">
                <div class="row mb-2">
                    <label for="selectPizza" class="col-sm-6 col-form-label">Выберите пиццу:</label>
                    <div class="col-sm-6">
                        <select id="selectPizza" class="form-select" name="typeID">
                            <option selected>...</option>
                            <?php
                                $conn = include('../php/db.php');
                                include "../php/getData.php";
                                getData($conn, "typepizza");
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="selectSize" class="col-sm-6 col-form-label">Выберите размер, см.:</label>
                    <div class="col-sm-6">
                        <select id="selectSize" class="form-select" name="sizeID">
                            <option selected>...</option>
                            <?php
                                getData($conn, "sizepizza");
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="selectSauce" class="col-sm-6 col-form-label">Выберите соус:</label>
                    <div class="col-sm-6">
                        <select id="selectSauce" class="form-select" name="sauceID">
                            <option selected>...</option>
                            <?php
                                getData($conn, "saucepizza");
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-2">
                    <label class="col-sm-6 col-form-label">К оплате:</label>
                    <div class="col-sm-6">
                    <input id="costOrder" type="text" name="costOrder" class="col-sm-7 form-control" readonly value='0'>
                    </div>
                </div>
                    <button id="btnOrder"  class="btn btn-primary mb-3">Заказать</button>
            </form>
        </div>
    </div>
    <div class="card order">
        <div class="card-header">
            Заказ
        </div>
        <div class="card-body">
            <form class="row g-1">
                <p class="alignCenter">OOO "PIZZA TERMINAL"</p>
                <p class="alignCenter">*******************************</p>
                <p class="alignCenter">УНП 123456789</p>
                <p class="alignCenter">РН 987654321</p>
                <p>ОПЕРАТОР 1</p>
                <p class="alignCenter">ЧЕК ПРОДАЖИ</p>
                <figure>
            </form>
        </div>
    </div>
</article>