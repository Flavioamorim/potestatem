@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            			<li> <?php echo $error ?> </li>
            @endforeach
        </ul>
    </div>
@endif