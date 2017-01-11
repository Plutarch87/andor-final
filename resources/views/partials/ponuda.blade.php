@if($item->akcija)
    <span class="akcija flex-ponuda"><a href="{!! url('ponude/akcija') !!}">Akcija</a></span>
@endif
@if($item->popularno)                        
    <span class="popular flex-ponuda"><a href="{!! url('ponude/popular') !!}">Hot</a></span>
    
@endif
@if($item->created_at > Carbon\Carbon::today()->addWeeks(-1))
    <span class="novo flex-ponuda"><a href="{!! url('ponude/novo') !!}">Novo</a></span>
@endif