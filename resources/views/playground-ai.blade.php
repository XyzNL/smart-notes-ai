<form method="Get">
  <textarea name="prompt" rows="6"></textarea>
  <button>Kirim</button> 
</form>


@if (isset($response)) 
  <div>
    {!! $response !!} 
  </div>
@endif