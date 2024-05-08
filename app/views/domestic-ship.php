<?php require APPROOT . 'views/include/header.php'; ?>
<body class="text-white" style="background-color: #1F2634">
<?php require APPROOT . 'views/components/userNavBar.php'; ?>
<div class="container my-5">
    <div class="row">
        <div class="col-sm-12 mb-3 mb-sm-4">
            <div class="card p-2" style="background-color: #353A4A">
                <div class="card-body">
                    <h3 class="card-title text-light mb-4">國內船舶資訊</h3>
                    <table class="table table-bordered mt-3">
                        <thead>
                        <tr>
                            <th class="table-primary" scope="col">船種</th>
                            <th class="table-primary" scope="col">船名</th>
                        </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <tr>
                            <td>起重船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=1">翡翠輪</a>
                            </td>
                        </tr>
                        <tr>
                            <td>自升式平台船</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>佈纜船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=2">東方海威</a>
                            </td>
                        </tr>
                        <tr>
                            <td>拖船/安錨船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=3">台船11號</a>
                                、
                                <a href="./?url=page/domestic-ship-information&ship_id=4">台船16號</a>
                            </td>
                        </tr>
                        <tr>
                            <td>駁船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=5">台船15號</a>
                                、
                                <a href="./?url=page/domestic-ship-information&ship_id=6">東方巴法洛</a>
                            </td>
                        </tr>
                        <tr>
                            <td>多功能支援船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=7">東方建設者</a>
                            </td>
                        </tr>
                        <tr>
                            <td>海船整平船/拋石船</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>調查船</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>探勘船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=8">大地能源號</a>
                            </td>
                        </tr>
                        <tr>
                            <td>運維船</td>
                            <td>
                                <a href="./?url=page/domestic-ship-information&ship_id=9">大三商領航者</a>
                            </td>
                        </tr>
                        <tr>
                            <td>人員運輸船</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>警戒船</td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>