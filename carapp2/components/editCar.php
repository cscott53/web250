<a href="?pg=table">&larr;Back</a><br>
<br><form>
    <div class="formrow"><label for="vin">VIN:&#9;</label>
    <input type="text" id="newVin"></div><br>
    <div class="formrow"><label for="make">Make:</label>
    <input type="text" id="newMake"></div><br>
    <div class="formrow"><label for="model">Model:</label>
    <input type="text" id="newModel"></div><br>
    <div class="formrow"><label for="price">Price:</label>
    <input type="text" id="newPrice"></div><br>
    <div class="formrow"><label for="year">Year:</label>
    <input type="text" id="newYear"></div><br>
    <div class="formrow"><label for="trim">Trim:</label>
    <input type="text" id="newTrim"></div><br>
    <div class="formrow"><label for="color">Exterior Color:</label>
    <input type="text" id="newColor"></div><br>
    <div class="formrow"><label for="interior">Interior Color:</label>
    <input type="text" id="newInterior"></div><br>
    <div class="formrow"><label for="mileage">Mileage:</label>
    <input type="text" id="newMileage"></div><br>
    <div class="formrow"><label for="transmission">Transmission:</label>
    <input type="text" id="newTransmission"></div><br>
    <button id="update">Update</button>
    <script>
        let cap=s=>s[0].toUpperCase()+s.slice(1)
        if (location.href.includes('?')) {
            let queryParams=new URLSearchParams(location.search)
            document.querySelectorAll('.formrow').forEach(e=>{
                let input=e.querySelector('input')
                input.value = queryParams.get(input.id.replace('new','').toLowerCase())
            })
        }
        document.getElementById('update').onclick=e=>{
            e.preventDefault()
            let [vin,make,model,price,year,trim,color,interior,mileage,transmission]=
            ['vin','make','model','price','year','trim','color','interior','mileage','transmission']
            .map(e=>
                document.getElementById('new'+cap(e)).value
            )
            location.href=`?vin=${vin}&make=${make}&model=${model}&price=${price}&year=${year}&trim=${trim}&color=${color}&interior=${interior}&mileage=${mileage}&transmission=${transmission}&pg=updateCar`
        }
    </script>
</form>