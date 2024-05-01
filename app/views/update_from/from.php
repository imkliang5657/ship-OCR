<!DOCTYPE html>
<meta charset="utf-8">
<header>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
      integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK"
      crossorigin="anonymous">
    </script>
</header>
<body>
    <div class="row m-5">
		<div class="col-lg-5">
            <form class=card action="./index.php?url=Update_from/insert" method="post" enctype="multipart/form-data" align="center">
                <h2>船舶輸入</h2>
               <!--<input type="hidden" value="Update_from/insert" name="url">-->
                <p><input type="button" value="匯入規格" onclick="location.href='./import.html'" ></p>
                    <p>船名<input type="text" id="name" name="name" ></p>
                <div class="row m-5">
                    <select name="ship_class" class="form-select" aria-label="Default select example">
                        <option selected>船種</option>
                        <option value="dog">A</option>
                        <option value="cat" >B</option>
                        <option value="hamster">C</option>
                        <option value="parrot">D</option>
                        <option value="spider">E</option>
                        <option value="goldfish">F</option>
                    </select>
                </div>
                    <p>IMO<input type="text" id="IMO" name="IMO" ></p>
                <h3>規格</h3>
                    <p><input type="text"  name="LOA" ></p>
                    <p><input type="text" name="breadth"  ></p>
                    <p><input type="text" name="depth"  ></p>
                    <p><input type="text" name="draft_min"  ></p>
                <p> <button type="submit" class="btn btn-primary mb-3">上傳</button></p>
            </form>
        </div>
    </div>
    <br>
    <div class="row m-5">
		<div class="col-lg-5">
            <form class=card action="./index.php" method="post" enctype="multipart/form-data" align="center">
                <div class="mt-5">
                    <h2 align="center">申請案輸入</h2>
                <div class="col-auto">
                    <p>風場<input type="text" id="name" name="name" ></p>
                    <p>函號<input type="text" id="name" name="name" ></p>
                    <p>工作項目<input type="text" id="name" name="name" ></p>
                    <p>申請船期<input type="text" id="name" name="name" ></p>
                    <p><input type="text" id="name" name="name" ></p>
                    <p>徵詢船期<input type="text" id="name" name="name" ></p>
                    <p><input type="text" id="name" name="name" ></p>
                    </div>  
                    <p> <button type="submit" class="btn btn-primary mb-3">提交</button></p>
                </div>
            </form>
        </div>
    </div>
</body>