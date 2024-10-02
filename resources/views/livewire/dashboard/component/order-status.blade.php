<div>
    @if($user['role_id']==5 and $orderStatus=="ready_to_send")
        <span class="btn btn-icon-success btn-light-success btn-sm ms-auto"
              wire:click="getOrderForSend()"> {{__('index.get order for send')}} </span>
    @elseif(isset($statusAfter[$orderStatus]) and $statusAfter[$orderStatus]=="preparing")
        <span class="btn btn-icon-success btn-light-success btn-sm ms-auto"
              onclick="accept({{$orderId}})">
            {{__('index.change to '.$statusAfter[$orderStatus])}}
        </span>
    @elseif(isset($statusAfter[$orderStatus]))
        <span class="btn btn-icon-success btn-light-success btn-sm ms-auto"
              wire:click="changeStatus()">
            {{__('index.change to '.$statusAfter[$orderStatus])}}
        </span>
    @elseif(session('role_id')==1 || session('role_id')==6 and $orderStatus=="delivered")
        <a onclick="returnedStore({{$orderPrice}})"
           class="btn btn-warning btn-sm"
           id="order-invoice-print">{{ __('index.returned create') }}</a>
    @endif


</div>

<script>
    function returnedStore(amount) {
        var a = Swal.fire({
            title: "اطلاعات جهت ثبت مرجوعی را وارد کنید",
            html: `
             <div class="mb-10 fv-row col-12 p-1 float-start">
                <label class="required form-label"><?php echo e(__('index.returned amount pay')); ?></label>
                <input  type="number" disabled dir="ltr" id='amount' value=` + amount + `  class="form-control fs-3 mb-2 text-left "/>
            </div>
             <div class="mb-10 fv-row col-12 p-1 float-start">
                <label class="required form-label"><?php echo e(__('index.description')); ?></label>
                <textarea id="descriptionReturned" type="text"
                          class="form-control fs-3 mb-2"></textarea>
            </div>

            <div class="mb-1 fv-rowp-1 col-12 float-start">
                <label class="required form-label"><?php echo e(__('index.whose account should be deducted?')); ?></label>
                <select class="form-select mb-2" id="whoseAccount">
                    <option value="branch"><?php echo e(__('index.branch')); ?></option>
                    <option value="driver"><?php echo e(__('index.driver')); ?></option>
                    <option value="branchAndDriver"><?php echo e(__('index.returned branch and driver')); ?></option>
                    <option value="system"><?php echo e(__('index.system')); ?></option>
               </select>
            </div>
                            `,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ثبت مرجوعی!",
            cancelButtonText: "لغو",
            preConfirm: () => {
                var description = document.getElementById("descriptionReturned").value;
                var amount = document.getElementById("amount").value;
                var whoseAccount = document.getElementById("whoseAccount").value;
                Livewire.dispatch('saveReturned', {
                    amount: amount,
                    description: description,
                    whoseAccount: whoseAccount
                });
            }
        });
    }

    function accept(orderId) {
        var a = Swal.fire({
            title: "لطفا زمان آماده شدن سفارش را انتخاب کنید",
            html: `
            <div class="mb-1 fv-rowp-1 col-12 float-start">
                <select class="form-select mb-2" id="timeSelected">
                <?php
                                   foreach ($times as $time) {
                                       echo "<option value=" . $time['minute'] . ">" . $time["title"] . '</option>';
                                   }
                                   ?>
            </select>
            </div>`,
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "تغییر به تایید سفارش!",
            cancelButtonText: "لغو",
            preConfirm: () => {
                let timeSelected = document.getElementById("timeSelected").value;
                Livewire.dispatch('acceptOrder.' + orderId, {
                    minute: timeSelected,
                });
            }
        });
    }
</script>
