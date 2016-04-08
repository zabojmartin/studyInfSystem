<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Teacher/default.latte

class Template7805c9b3c4b57fc41f6d3892aa9a1288 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5fcffae18d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0aee396297_content')) { function _lb0aee396297_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:addTeacher"), ENT_COMPAT) ?>
">Add teacher</a></h2>
  <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Teacher:registerTeacher"), ENT_COMPAT) ?>
">Register teacher to course</a></h2>
   <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sheet:default"), ENT_COMPAT) ?>
">My Sheets</a></h2>
      <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sheet:editSheet"), ENT_COMPAT) ?>
">Edit </a></h2>


      
           <table>
 <thead>
  <tr>
     <th>Jméno</th>
     <th>Příjmení</th>
     <th>Datum narození</th>
     <th>Email</th>
  </tr>
 </thead>
 <tbody>   
<?php $iterations = 0; foreach ($teachers as $teacher) { ?>

  <tr>
     <td><?php echo Latte\Runtime\Filters::escapeHtml($teacher->name, ENT_NOQUOTES) ?></td>
     <td><?php echo Latte\Runtime\Filters::escapeHtml($teacher->surname, ENT_NOQUOTES) ?></td>
       <td><?php echo Latte\Runtime\Filters::escapeHtml($teacher->dateOfBirth, ENT_NOQUOTES) ?></td>
         <td><?php echo Latte\Runtime\Filters::escapeHtml($teacher->email, ENT_NOQUOTES) ?></td>
  </tr>
 
 
 
<?php $iterations++; } ?>
    
    </tbody>
</table>
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbc72531e1f7_title')) { function _lbc72531e1f7_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?> <h1>Teachers</h1>    
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}