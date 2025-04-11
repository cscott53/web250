<h2>Fizz buzz bang</h2>
<form>
    <div class="formrow">
        <label>Name:</label>
        <input type="text" id="first" placeholder="First">
        <input type="text" id="middle" placeholder="Middle initial (optional)">
        <input type="text" id="last" placeholder="Last">
    </div>
    <div class="formrow">
        <label for="defaultWord">Default word:</label>
        <input type="text" id="defaultWord">
        <label for="count">Count:</label>
        <input type="text" id="count">
    </div>
    <div class="formrow">
        <label for="word1">Word 1</label>
        <input type="text" id="word1">
        <label for="word2">Word 2</label>
        <input type="text" id="word2">
        <label for="word3">Word 3</label>
        <input type="text" id="word3">
    </div>
    <div class="formrow">
        <label for="divisor1">Divisor 1</label>
        <input type="text" id="divisor1">
        <label for="divisor2">Divisor 2</label>
        <input type="text" id="divisor2">
        <label for="divisor3">Divisor 3</label>
        <input type="text" id="divisor3">
    </div>
    <button type="button" id="fizzbuzzBtn">Submit</button>
    <script>
        document.getElementById('fizzbuzzBtn').onclick=()=>{
            let fName=document.getElementById('first').value,
                mIntl=document.getElementById('middle').value,
                lName=document.getElementById('last').value,
                defWord=document.getElementById('defaultWord').value,
                count=document.getElementById('count').value,
                words=[1,2,3].map(e=>document.getElementById('word'+e).value),
                divisors=[1,2,3].map(e=>document.getElementById('divisor'+e).value)
            location.href=
                `?pg=fizzbuzz_bang&name=${fName}_${mIntl}_${lName}&defWord=${defWord}` +
                `&count=${count}&words=${words.join('_')}&divisors=${divisors.join('_')}`
        }
    </script>
</form>