<?php


	use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    use League\Flysystem\Filesystem;
    use League\Flysystem\Adapter\Local as Adapter;
    
    
    class CreatePhotosTable extends Migration {
    
        private $filesystem;
    
        public function __construct(){      
            $this->filesystem = new Filesystem(new Adapter( public_path() ));
        }
    
    	public function up()
    	{
    
            $this->filesystem->createDir('images');
    
            Schema::create('photos', function($table)
            {
                $table->increments('id');
                $table->integer('user_id');
                $table->string('title');
                $table->string('url')->unique();
                $table->text('description');
                $table->integer("category");
                $table->timestamps();
            });
    	}
    
    	public function down()
    	{
    
            Schema::dropIfExists('photos');
    
            $this->filesystem->deleteDir('images');
    
    	}
    
    }