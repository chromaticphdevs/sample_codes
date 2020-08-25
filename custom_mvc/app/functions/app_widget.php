<?php   

    function order_items($order_items)
    {
        $token = token_make();
        
        foreach($order_items as $key => $row):
        ?> 
            <div class="order_item card">
                <h5><?php echo $row->name?></h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="avatar">
                            <img alt="avatar" 
                                src="<?php echo GET_PATH_UPLOAD.DS.'products'.DS.$row->picture?>" class="rounded-circle" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="#" style="font-weight:bold"><?php echo $row->quantity?></label>
                        <span class="d-block">Quantity</span>
                    </div>
                    <div class="col-md-3">
                        <label for="#"><?php echo amountHTML($row->total_amount)?></label>
                        <span class="d-block">Declared Amount</span>
                    </div>

                    <div class="col-md-1">
                        <a href="/orderItem/edit/<?php echo seal($row->id)?>" class="text-primary">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="/orderItem/delete/<?php echo seal($row->id)?>?token=<?php echo $token?>" class="text-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach;
    }