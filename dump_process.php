<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>

  <div class="container">

    <div class="row">

      <div class="col">

        <div class="card-header py-1">
          <div class="row p-0">

            <div class="col-0 d-flex align-items-center">
              ' . $classification . '
            </div>

            <div class="col-0 d-flex align-items-center ml-auto">
              <div class="mr-2">Status: ' . $status . '</div>
              <div class="mr-2">Order ID: ' . $order_id . '</div>
            </div>

          </div>
        </div>

        <div class="card-body p-0" style="background-color: #272a4e;">
          <div class="row d-flex justify-content-between align-items-center ">



            <div class="col-3 overflow-hidden">
              <p class="h6 fw-normal mb-2 text-truncate" data-toggle="tooltip" title="Title" style="max-width:270px;">
                ' . $fetched_title . '
              </p>
              ' . $description . '
            </div>

            <div class="col">
              <h5 class="mb-0">&#8369; ' . number_format($price, 2) . '</h5>
            </div>

            <div class="col">
              ' . $quantity_input . '
            </div>

            <div class="col">
              <h5 class="mb-0" style="color: #26d3e0">&#8369; ' . number_format($total_price, 2) . '</h5>
            </div>


          </div>
        </div>


      </div>

    </div>
  </div>
</body>

</html>