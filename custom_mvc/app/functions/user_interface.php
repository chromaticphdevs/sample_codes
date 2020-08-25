<?php   
    function _ui_menu(array $param , $pages = null)
    {
        $href     = makeRequest($param['href']);
        
        // $expanded = strtolower($_GET['url']) == strtolower($param['href']) ? 'true' : 'false';
        $xplodeHref = explode('/',$param['href']);
        $xplodeUrl  = explode('/' ,$_GET['url'] ?? '');

        $active = strtolower($xplodeHref[1]) == strtolower($xplodeUrl[0]) ? 'active' : '';

        $name      = $param['name'];
        $icon      = $param['icon'];



        print <<<EOF
        <li class="menu single-menu {$active}">
                <a href="{$href}"  class="dropdown-toggle autodroprown">
                    <div class="">
                        {$icon}
                        <span>{$name}</span>
                    </div>
                </a>
            </li>
        EOF;
    }

    function _ui_request($path , $name)
    {
        $path = makeRequest($path);
        print <<<EOF
            <a href="{$path}" class="btn btn-outline-primary btn-sm btn-rounded mb-2">{$name}</a>
        EOF;
    }


    function _ui_link_create($link) 
    {
        $request = makeRequest($link);

        $html = <<<EOF
            <a href="$request" class="btn btn-primary btn-sm mb-2"><i class="fa fa-plus"></i></a>
        EOF;

        return $html;
    }

    function _ui_link_edit($link)
    {
        $request = makeRequest($link);

        $html = <<<EOF
            <a href="$request" class="btn btn-primary btn-sm mb-2"><i class="fas fa-edit"></i></a>
        EOF;

        return $html;
    }

    function _ui_link_refresh($link = null)
    {   

        $link = is_null($link) ? $_SERVER['REQUEST_URI']:$link;

        $request = makeRequest($link);

        $html = <<<EOF
            <a href="$request" class="btn btn-default btn-sm mb-2"><i class="fas fa-redo"></i></a>
        EOF;

        return $html;
    }