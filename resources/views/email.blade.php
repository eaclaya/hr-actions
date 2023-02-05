<div class="container" style="padding: 1rem; background: #f5f5f5;">
     <div class="max-w-5xl mx-auto py-4 relative overflow-hidden">
            <img
                src="https://kmmotos.miposvirtual.com/logo/Qe8VzjgsFWsc8s7ikOxDChnsz6hY9bz6.jpeg?no_cache=1660864308"
                alt="Logo"
                class="absolute top-0 lg:top-4 left-4 w-12 lg:w-24"
            />
            <h1 class="text-center font-bold text-md lg:text-2xl">Accion de personal</h1>
            <h2 class="text-center font-bold text-md lg:text-xl mb-12">
                Departamento de talento humano
            </h2>
            <div class="flex justify-between items-center">
                <p class="text-sm lg:text-md">
                    Colaborador: {{ $employee->first_name }}
                    {{ $employee->last_name }}
                </p>
                <p class="text-sm lg:text-md">Puesto: {{ $employee->profile }}</p>

                <p style="width: 100%; display: inline-block; vertical-align: middle">
                            Tienda: {{ isset($employee->account->name)? $employee->account->name : DB::table('accounts')->where('id', $employee->account_id)->first()->name }} 
                </p>

            </div>

             <ul class="flex flex-col px-2">
             	@foreach($categories as $category)
        <li  class="my-8">
            <h2 class="w-full text-center font-bold text-md lg:text-xl mb-4">
                {{ $category->name }}
            </h2>
            <div class="grid grid-cols-1 lg:grid-cols-2">
            	@foreach($category->types as $type)
                <div
                    class="flex items-center gap-2"
                >
                    <input
                        type="checkbox"
                        disabled="disabled"
                        @if(isset($selectedItems[$type->id]))
                        checked="checked"
                        @endif
                    />
                    <label class="text-sm lg:text-md">{{ $type->name }}</label>
                    @if($type->label)
                    <span class="text-gray-500 text-sm"
                        >({{ $type->label }})</span
                    >
                    @endif
                    @if($type->has_comments)
                    <input
                        type="text"
                        class="border-0 border-b border-gray-400"
                        disabled="disabled"
                        @if(isset($selectedItems[$type->id]))
                        	value="{{ isset($selectedItems[$type->id]) ? $selectedItems[$type->id]['description'] : '' }}
                        @endif
                        
                    />
                    @endif
                </div>
                @endforeach
            </div>
        </li>
        @endforeach
    </ul>

            <div class="flex items-center gap-4 mb-8">
                <p class="text-sm lg:text-md">Fechas que implica el movimiento:</p>
                <p class="flex items-center gap-4">
                    <span
                        >Desde:
                        <input
                            type="date"
                            name="from_date"
                            value="{{ $action->from_date }}"
                            disabled
                    /></span>
                    <span
                        >Hasta:
                        <input
                            type="date"
                            name="to_date"
                            value="{{ $action->to_date }}"
                            disabled
                    /></span>
                </p>
            </div>
            <div class="w-full flex gap-4 mb-24">
                <p class="text-sm lg:text-md">Explicacion:</p>
                <p
                    name="comments"
                    id="comments"
                    >{{ $action->comments }}</p
                >
            </div>
        </div>


</div>
