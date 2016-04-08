<?php
// source: C:\Users\zaboy\Programs\xampp\htdocs\study\sandbox\app\presenters/templates/Student/default.latte

class Template945ba37f746202d531570f8e5032acb3 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7d316ab1fe', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3176a8b210_content')) { function _lb3176a8b210_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
    <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Student:addStudent"), ENT_COMPAT) ?>
">Add student</a></h2>
     <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Student:registerCourses"), ENT_COMPAT) ?>
">Register courses</a></h2>
  
  
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
     
<?php $iterations = 0; foreach ($students as $student) { ?>
   
        
 
  <tr>
     <td><?php echo Latte\Runtime\Filters::escapeHtml($student->name, ENT_NOQUOTES) ?></td>
     <td><?php echo Latte\Runtime\Filters::escapeHtml($student->surname, ENT_NOQUOTES) ?></td>
       <td><?php echo Latte\Runtime\Filters::escapeHtml($student->dateOfBirth, ENT_NOQUOTES) ?></td>
         <td><?php echo Latte\Runtime\Filters::escapeHtml($student->email, ENT_NOQUOTES) ?></td>
  </tr>
 

 
<?php $iterations++; } ?>
    
     </tbody>
</table>
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb8f0cd91fd6_title')) { function _lb8f0cd91fd6_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?> <h1>Students</h1>    
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