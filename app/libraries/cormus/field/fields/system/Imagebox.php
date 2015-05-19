<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Image
 *
 * @author Alex
 */
class Imagebox extends Field{
    
   
	var $path = null;
	
    public function tableData($table)
    {
        $table->text($this->getName());
        return $table;
    }
    
    public function render($row)
    {
        $required = '';
        if($this->getRequired())
           $required = '<span class="required">*</span>';
        
        $subTitle = '';
        if($this->getSubTitle())
            $subTitle = '<span class="subtitle">'.$this->getSubTitle().'</span>';
        
		$value = '';
		if($row)
		{
			$name  = $this->getName();
			$value = $row->$name;
		}
		else if($this->getValue())
		{
			$value = $this->getValue();
		}

		$html = '';
		$images = json_decode($value);
		if(!empty($images))
		{
			foreach($images as $image)
			{
				$html .= '<img src="'.URL::to("imagem.php?p={$image}&w=150&h=150").'" data="'.$image.'" class="'.$this->getName().'-img"/>';
			}
		}
		
	 	return '<div class="form-group">
                    '.Form::label($this->getName(), $this->getTitle())
                     .$required
                     .$subTitle
                     .'<input id="'.$this->getName().'"     type="hidden"  value="'.$value.'" id="'.$this->getName().'"/>
					   <input  id="'.$this->getName().'-url" type="hidden"/>
					   <div class="width-100-l">'.$html.'</div>
                </div>
				
				<div id="'.$this->getName().'-imgs"></div>
				<a href="bawer/tinymce_4.1.9/plugins/filemanager/dialog.php?type=1&field_id='.$this->getName().'-url" class="btn iframe-btn" type="button">Select</a>
				<script type="text/javascript">
					 var baseImg = "'.URL::asset('/').'";
					 $(function(){
						$(".iframe-btn").fancybox({
							  "width"	 : "880px",
							  "height"	 : "570px",
							  "type"	 : "iframe",
							  "autoScale": false
						});
					 });
					 function responsive_filemanager_callback(field_id)
					 {
						var url  = $("#"+field_id).val();
						url = url.replace(baseImg, "");
						$("#'.$this->getName().'-imgs").append("<img src=\'"+baseImg+"imagem.php?p="+url+"&w=150&h=150\' data=\'"+url+"\' class=\''.$this->getName().'-img\'/>");
						var imgs = [];
						$(".'.$this->getName().'-img").each(function(i, data){
							imgs.push($(data).attr("data"));
						});
						$("#'.$this->getName().'").val(JSON.stringify(imgs));
					 }
				</script>';
    }
    
    public function treatmentValue($row)
    {
        $name = $this->getName();
        if($row->$name)
        {
            $images = json_decode($row->$name);
            if(!empty($images))
            {
                return '<img src="'.URL::to("imagem.php?p={$this->path}/{$images[0]}&w=150&h=150").'"/>';
            }
        }
    }
}
