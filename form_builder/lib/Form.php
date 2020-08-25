<?php
	
	class Form
	{

		public static function select($name , $values , $selected = null, $attributes = null)
		{
			$isAssoc = is_assoc($values);

			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$options = '';

			$selected = is_null(FormInput::get($name)) ? $selected : FormInput::get($name);

			foreach($values as $key => $value) 
			{
				$select = '';

				$key = trim($key);
				$selected = trim($selected);
				
				if($isAssoc)
				{
					if(! is_null($selected)) {
						if(strtolower($key) == strtolower($selected)){
							$select = 'selected';
						}
					}

					$options .= "<option value='{$key}' {$select}> ".ucfirst($value)." </option>";
				}else{
					if(! is_null($selected)) {

						if(strtolower($value) == strtolower($selected)){
							$select = 'selected';
						}
					}
					$options .= "<option value='{$value}' {$select}> ".ucfirst($value)." </option>";
				}
			}

			print <<<EOF
				<select name = "{$name}" {$attributes}>
					<option value=''>--Select</option>
					{$options}
				</select>
			EOF;
		}


		public static function label($html , $for = null, $attributes = null) 
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);


			$html = ucwords($html);

			print <<<EOF
				<label {$attributes} for="{$for}">
					{$html}
				</label>
			EOF;
		}

		public static function small($html , $attributes = NULL)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);


			$html = ucwords($html);

			print <<<EOF
				<small {$attributes}>
					{$html}
				</small>
			EOF;
		}

		public static function hidden($name , $value , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);
		
			print <<<EOF
				<input type="hidden" name="{$name}" 
					value="$value" $attributes>
			EOF;
		}

		public static function text($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name); 

			print <<<EOF
				<input type="text" name="{$name}" 
					value="$value" $attributes>
			EOF;
		}

		public static function number($name , $value = null , $attributes = null)
		{

			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name); 


			print <<<EOF
				<input type="number" name="{$name}" 
					value="$value" $attributes>
			EOF;
		}

		public static function date($name , $value , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name); 

			print <<<EOF
				<input type="date" name="{$name}" 
					value="$value" $attributes>
			EOF;
		}


		public static function textarea($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name); 

			print <<<EOF
				<textarea name="{$name}" $attributes>$value</textarea>
			EOF;
		}


		public static function file($name, $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			print <<<EOF
				<input type="file" name="{$name}" $attributes>
			EOF;
		}

		public static function checkbox($name , $value = '', $selected = FALSE , $attributes = null) 
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$selected   = !$selected ? '' : 'checked';

			print <<<EOF
				<input type="checkbox" name="{$name}" value="{$value}" {$selected} $attributes>
			EOF;
		}

		public static function submit($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			$value = is_null($value) ? "Submit" : $value;

			print <<<EOF
				<input type="submit" name="{$name}" 
					value="$value" $attributes>
			EOF;
		}

		public static function open(array $attributes)
		{
			$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);

			print <<<EOF
				<form $attributes>
			EOF;
		}


		public static function close()
		{
			print <<<EOF
				</form>
			EOF;
		}

	}