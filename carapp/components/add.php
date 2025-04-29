<form>
    <span class="formrow"><label for="vin">VIN:&#9;</label>
    <input type="text" id="vin"></span>
    <span class="formrow"><label for="make">Make:</label>
    <input type="text" id="make"></span>
    <span class="formrow"><label for="model">Model:</label>
    <input type="text" id="model"></span>
    <span class="formrow"><label for="price">Price:</label>
    <input type="text" id="price"></span>
    <span class="formrow"><label for="year">Year:</label>
    <input type="text" id="year"></span><br>
    <br><button id="addNew">Add</button><br>
    <button id="cancelAdd">Cancel</button>
    <script>
        document.getElementById('addNew').onclick= (e) => {
            e.preventDefault();
            let [vin,make,model,price,year]=['vin','make','model','price','year'].map((e) => 
                document.getElementById(e).value
            );
            location.href=`?vin=${vin}&make=${make}&model=${model}&price=${price}&year=${year}&pg=submitCar`;
        };
    </script>
</form>