<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login Now</title>
    <!-- Bootstrap link css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <div class="container">
      <form class="form-group">
        <div class="mb-3 bg p-5 rounded">
          <h2 class="text-center">Login Admin</h2>
          <label
            for="exampleFormControlInput1"
            class="text-center"
            >username</label
          >
          <input
            type="email"
            class="form-control"
            id="exampleFormControlInput1"
            placeholder="Fastpay"
          />
          <label
            for="exampleFormControlInput1"
            class="text-center"
            >Password</label
          >
          <input
            type="password"
            class="form-control"
            id="exampleFormControlInput1"
             placeholder="Fastpay"
          />
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" />
            <label class="text-center" for="gridCheck">Remember me</label>
          </div>
          <input 
            type ="submit"
            class="form-control btn-color mt-3"
            id="exampleFormControlInput1"
          />
        </div>
      </form>
    </div>

    <!-- Bootstrap link js -->
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

