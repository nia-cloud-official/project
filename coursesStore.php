<form action="invoice.php" method="post">
<div class="item">
<h1>Course 1</h1> <input type="text" value="Course About Cats 1" name="coursename" id="" hidden/>
<p>Course about cats and dogs and stuff like that </p> <input type="text" name="courseinfo" value="Course about cats and dogs and stuff like that" hidden/>
<p>$100</p><input type="text" name="cost" value="100" hidden/>
<button type="submit" class="btn">Place an Order</button>
</div>
<div class="item">
<h1>Course 3</h1> <input type="text" value="Course About Girls 1" name="coursename" id="" hidden/>
<p>Course about girls and boys and stuff like that </p> <input type="text" name="courseinfo" value="Course about girls and boys and stuff like that" hidden/>
<p>$400</p><input type="text" name="cost" value="400" hidden/>
<button type="submit" class="btn">Place an Order</button>
</div>
<div class="item">
<h1>Course 1</h1> <input type="text" value="Course About Rats 1" name="coursename" id="" hidden/>
<p>Course about rats and mice and stuff like that </p> <input type="text" name="courseinfo" value="Course about rats and mice and stuff like that" hidden/>
<p>$500</p><input type="text" name="cost" value="500" hidden/>
<button type="submit" class="btn">Place an Order</button>
</div>
</form>

<style>
    .btn { 
        padding:10px;
    }
    .item { 
        padding: 10px;
        border: 0.1px solid;
        width: 250px;
        border-radius:8px;
        box-shadow: purple 1px 1px 3px 1px;
    }
</style>