<a href="?pg=table" class="backBtn">&larr;Back</a><br>
<br><form>
    <span class="formrow"><span class="label">VIN:</span>
    <span class="vin"><?= $_GET['vin'] ?></span></span><br><br>
    <span class="formrow"><label for="make">Make:</label>
    <input type="text" id="newMake" value="<?= $_GET['make'] ?>"></span>
    <span class="formrow"><label for="model">Model:</label>
    <input type="text" id="newModel" value="<?= $_GET['model'] ?>"></span>
    <span class="formrow"><label for="price">Price:</label>
    <input type="text" id="newPrice" value="<?= $_GET['price'] ?>"></span>
    <span class="formrow"><label for="year">Year:</label>
    <input type="text" id="newYear" value="<?= $_GET['year'] ?>"></span><br>
    <br><button type="button" id="update">Update</button>
    <script>
        let cap = (str) => str[0].toUpperCase() + str.slice(1);
        document.getElementById('update').onclick = (e) => {
            event.preventDefault();
            let vin = document.querySelector('.vin').innerText;
            let [make, model, price, year] = ['make', 'model', 'price', 'year'].map((field) =>
                document.getElementById('new' + cap(field)).value
            );
            location.href = `?vin=${encodeURIComponent(vin)}&make=${encodeURIComponent(make)}&model=${encodeURIComponent(model)}&price=${encodeURIComponent(price)}&year=${encodeURIComponent(year)}&pg=updateCar`;
        };
    </script>
</form>