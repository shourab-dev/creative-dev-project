<label class="my-3 block">
  <span class="text-gray-700 font-semibold mb-1 inline-block">{{ $label }}</span>
  <input type="file" {{ $attributes }} class="file:mr-4 
            file:py-2
            file:px-4 
            file:rounded-full 
            file:border-0
            file:text-sm 
            file:font-semibold 
            file:text-white
            file:bg-blue-400 
            {{ $error == null ? 'hover:file:text-blue-700 hover:file:bg-blue-100 ' : 'file:text-red-700 text-red-600 hover:file:bg-red-100' }}
            
          
          w-full" {{ $multiple==true ? 'multiple' : '' }} id="upload{{ $iteration }}">
</label>