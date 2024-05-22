<?php $id = $id ?? ''; ?>
<div class="col-sm-5 mb-4 mb-sm-4">
    <div class="card p-2" style="background-color: #2A3041">
        <div class="card-body">
            <form method="post" action="./?url=upsert-wind-farm-information">
                <div class="row">
                    <div class="col-5">
                        <h4 class="card-title text-light mb-3">基本資料</h4>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="hidden" name="wind_farm_id" value="<?= $data['windFarm']['id'] ?>">
                <div class="input-group my-3">
                    <span class="input-group-text">船種</span>
                    <select class="form-select" name="vessel_category_id" aria-label="vessel_category" required>
                        <option selected disabled></option>
                        <?php foreach ($data['vesselCategories'] as $vesselCategory): ?>
                            <option value="<?= $vesselCategory['id'] ?>" <?= ($info['vessel_category_id'] == $vesselCategory['id']) ? 'selected' : '' ?>><?= $vesselCategory['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">工作項目</span>
                    <input type="text" class="form-control" name="item" aria-label="item" value="<?= $info['item'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">使用船期</span>
                    <input type="text" class="form-control datepicker" name="start_shipment_time" aria-label="start_shipment_time" value="<?= $info['start_shipment_time'] ?>" required>
                    <span class="input-group-text">至</span>
                    <input type="text" class="form-control datepicker" name="end_shipment_time" aria-label="end_shipment_time" value="<?= $info['end_shipment_time'] ?>" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">需求規格</span>
                    <textarea class="form-control" name="detail" rows="10" aria-label="detail" required><?= $info['detail'] ?></textarea>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">數量</span>
                    <input type="number" class="form-control" name="number" aria-label="number" value="<?= $info['number'] ?>" required>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="is_signed-<?= $id ?>" name="is_signed" value="1" <?= $info['is_signed'] ? 'checked' : '' ?>>
                    <label class="form-check-label text-light" for="is_signed-<?= $id ?>">已簽約</label>
                </div>
                <div class="btn-group" role="group" aria-label="submit">
                    <?php if (empty($id)): ?>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> 新增</button>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> 儲存</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>