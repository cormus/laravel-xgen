<?php
/**
 * Class para criação de cache para HTML
 * Esse método tem por finalidade reduzir as buscas no banco de dados 
 * dessa forma diminutir o tempo de resposta das requisições
 * 
 * @author alex@stoledo.com.br 27-09-2011
 * 
 */

class CacheModel
{	
	/**
	 * Variável que vai receber o caminho para a basta de cache
	 * @var String
	 */
	private $folder	= '';
	
	/**
	 * Variável que vai receber o nome do arquivo que vai ser crido
	 * @var String
	 */
	private $cacheName  = '';
	
	/**
	 * Variável que vai receber o valor que vai ser gravado no cache
	 * @var String
	 */
	private $cacheValue   = '';
	
	/**
	 * Váriável que vai conter os possíveis erros durante a execução da class
	 *  @var Array $error 
	 */
	private $error = array();
	
	
        
	/**
         * Seta o caminho onde o cache vai ser guardado
         * 
         * @param type $folder
         * @return void
         */
	public function setFolder($folder)
	{
		$this->folder = $folder;
	}
	
	
	/**
	 * Retornar os possíveis erros ocorridos dutante a execução da class
         * 
	 * @return Array
	 */
	public function getError()
	{
		return $this->error;
	}

	/**
	 *  Seta um nome para o cache do arquivo, se o nome não for setado um novo será é criado
	 * 
	 * @param $cacheName String
	 * @return void
	 */
	public function setCacheName($cacheName)
	{
		$this->cacheName = $cacheName;
	}
	
	/**
	 *  Seta um valor para o cache que vai ser criado
	 * 
	 * @param $cacheValue String
	 * @return void
	 */
	public function setCacheValue($cacheValue)
	{
		$this->cacheValue = $cacheValue;
	}
	
	
	/**
	 * Retorna o endereço do arquivo cache
	 * 
	 * @param $fileName String
	 * @return String
	 */
	public function getFilePath($fileName)
	{
		return $this->folder.'/'.$fileName;
	}
	
	/**
	 * Retorna o um valor booleano para saber se o arquivo de cache já existe ou não
	 * 
	 * @param $fileName String
	 * @return Boolean
	 */
	public  function fileExists($fileName)
	{
		return file_exists($this->getfilePath($fileName));
	}
	
	/**
	 * Cria o arquivo de cache, se estiver setado um nome ele apenas cria, mais se não estiver ele gera um MD5
	 * 
         * @param boolean controle para sobrescrever ou não o arquivo de cache
	 * @return int A função retorna a quantidade de bytes que foi escrita no arquivo ou FALSE em caso de falha.
	 */
	public function createCacheFile($overwrite = false)
	{
		//Cria um nome md5 baseado na data atual ISSO, se não for setado um nome
		if(!$this->cacheName)
			$this->cacheName =md5(date('c'));
		
		if(is_dir($this->getFilePath('')))
			//Verifica se o arquivo já existe para não sobresgrevelo
			if(!$this->fileExists($this->cacheName) or $overwrite == true)
			{
				//recupera o nome do diretório cocatenado com o nome do arquivo
				$filePath = $this->getFilePath($this->cacheName);
				//grava o arquivo de cache
				return file_put_contents($filePath,  $this->cacheValue);
			}
			else
				$this->error[] = 'Esse arquivo de cache já existe';
		else
			$this->error[] = 'Odiretório informado não é válido';	
                
                return false;
		
	}
	
	/**
	 * Método para retornar o valor de um cache
	 * 
	 * @return String
	 */
	public function  readCacheFile()
	{
		if($this->fileExists($this->cacheName))
		{
                    $filePath = $this->getFilePath($this->cacheName);
                    return file_get_contents($filePath);
		}
		else
                {
                        
                    $this->error[] = 'arquivo de cache não encontrado';
                    return null;
                }
	}
	
	/**
	 * Método para informar se o arquivo de cache está vazio
	 * 
	 * @return boolean
	 */
	public function isEmpty()
	{
		$content = trim($this->readCacheFile());
		if (empty($content))
			return true;
		return false;
	}
        
}
?>