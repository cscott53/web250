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
        let cap=s => s[0].toUpperCase()+s.slice(1)
        document.getElementById('update').onclick=e=>{
            e.preventDefault()
            let [vin,make,model,price,year]=['vin','make','model','price','year'].map(e =>
                document.getElementById('new'+cap(e)).value
            )
            location.href=`?vin=${vin}&make=${make}&model=${model}&price=${price}&year=${year}&pg=updateCar`
        }
    </script>
</form>