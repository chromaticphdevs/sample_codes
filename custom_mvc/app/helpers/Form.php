<?php
	class Form
	{

		public static function select($name , $values , $selected = null, $attributes = null)
		{
			$isAssoc = is_assoc($values);

			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$options = '';

			$selected = is_null(FormInput::get($name)) ? $selected : FormInput::get($name);

			foreach($values as $key => $value)
			{
				$select = '';

				if($isAssoc)
				{
					if(! is_null($selected)) {
						if(strtolower($key) == strtolower($selected)){
							$select = 'selected';
						}
					}

					$options .= "<option value='{$key}' {$select}> {$value} </option>";
				}else{
					if(! is_null($selected)) {

						if(strtolower($value) == strtolower($selected)){
							$select = 'selected';
						}
					}
					$options .= "<option value='{$value}' {$select}> {$value}</option>";
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
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);


			$html = ucwords($html);

			print <<<EOF
				<label {$attributes} for="{$for}">
					{$html}
				</label>
			EOF;
		}

		public static function checkbox($name , $value = null, $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			print <<<EOF
				<input type="checkbox" name="{$name}" value="{$value}" {$attributes} />
			EOF;
		}

		public static function small($html , $attributes = NULL)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);


			$html = ucwords($html);

			print <<<EOF
				<small {$attributes}>
					{$html}
				</small>
			EOF;
		}

		public static function hidden($name , $value , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			print <<<EOF
				<input type="hidden" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function text($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);

			print <<<EOF
				<input type="text" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function password($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);

			print <<<EOF
				<input type="password" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function number($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);


			print <<<EOF
				<input type="number" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function date($name , $value , $attributes)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);

			print <<<EOF
				<input type="date" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function time($name , $value , $attributes)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);

			print <<<EOF
				<input type="time" name="{$name}"
					value="$value" $attributes>
			EOF;
		}


		public static function textarea($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null(FormInput::get($name)) ? $value : FormInput::get($name);

			print <<<EOF
				<textarea name="{$name}" $attributes>$value</textarea>
			EOF;
		}


		public static function file($name, $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			print <<<EOF
				<input type="file" name="{$name}" $attributes>
			EOF;
		}

		public static function submit($name , $value = null , $attributes = null)
		{
			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

			$value = is_null($value) ? "Submit" : $value;

			print <<<EOF
				<input type="submit" name="{$name}"
					value="$value" $attributes>
			EOF;
		}

		public static function open(array $attributes)
		{
			if(!isset($attributes['method']))
				$attributes['method'] = 'post';

			$attributes = is_null($attributes) ? $attributes : keypair_to_str($attributes);

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

		public static function create($attributes)
		{
			Form::open($attributes);
			Form::close();
		}


		public static function btnSave($form , $attributes = null)
		{
			$attributes = is_null($attributes) ? 'class="btn btn-success btn-sm"' : keypair_to_str($attributes);

			print <<<EOF
				<button type="submit" role="submit" $attributes form="{$form}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
					height="24" viewBox="0 0 24 24" fill="none"
					stroke="currentColor" stroke-width="2" stroke-linecap="round"
					stroke-linejoin="round" class="feather feather-save">
					<path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
					<polyline points="17 21 17 13 7 13 7 21"></polyline>
					<polyline points="7 3 7 8 15 8"></polyline></svg> Save</button>
			EOF;
		}

		public static function btnCancel($href = NULL , $attributes = NULL)
		{
			if(is_null($href))
				$href = $_GET['url'];

			$attributes = is_null($attributes) ? 'class="btn btn-danger btn-sm"' : keypair_to_str($attributes);

			$href = makeRequest($href);

			print <<<EOF
				<a href="{$href}" $attributes><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
					viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
					stroke-linecap="round" stroke-linejoin="round"
					class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle>
					<line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line>
					</svg> Cancel</a>
			EOF;
		}

		public static function btnCreate($href = NULL , $attributes = NULL)
		{
			if(is_null($href))
				$href = $_GET['url'];

			$attributes = is_null($attributes) ? 'class="btn btn-primary btn-sm"' : keypair_to_str($attributes);

			$href = makeRequest($href);

			print <<<EOF
				<a href="{$href}" $attributes><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
				stroke-linecap="round" stroke-linejoin="round"
				class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle>
				<line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Create</a>
			EOF;
		}

		public static function btnList($href = NULL , $attributes = NULL)
		{
			if(is_null($href))
				$href = $_GET['url'];

			$attributes = is_null($attributes) ? 'class="btn btn-primary btn-sm"' : keypair_to_str($attributes);

			$href = makeRequest($href);

			print <<<EOF
				<a href="{$href}" $attributes><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
				stroke-linecap="round" stroke-linejoin="round"
				class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line>
				<line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line>
				<line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line>
				<line x1="3" y1="18" x2="3.01" y2="18"></line></svg> List</a>
			EOF;
		}

		public static function btnEdit($href = NULL , $attributes = NULL)
		{
			if(is_null($href))
				$href = $_GET['url'];

			$attributes = is_null($attributes) ? 'class="btn btn-primary btn-sm"' : keypair_to_str($attributes);

			$href = makeRequest($href);

			print <<<EOF
				<a href="{$href}" $attributes><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
				viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
				stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
				<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
				<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit</a>
			EOF;
		}

	}
