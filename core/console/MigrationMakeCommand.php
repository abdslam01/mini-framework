<?php

namespace Console;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationMakeCommand extends Command
{
    protected $commandName = 'make:migration';
    protected $commandDescription = "Create a migration";

    protected $commandArgumentName = "migrationTableName";
    protected $commandArgumentDescription = "the migration name"; 

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addArgument(
                $this->commandArgumentName,
                InputArgument::REQUIRED,
                $this->commandArgumentDescription
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tableName = $input->getArgument($this->commandArgumentName);
        $tableName = preg_replace("#[\.\\/]#", "_", $tableName);

        $MigrationName = "m".time()."_$tableName";
        $fullMigrationName = "./app/database/migrations/".$MigrationName;

        try{
            $file = fopen("$fullMigrationName.php", "w+");
            fwrite($file, "<?php

namespace App\database\migrations;

use Migration;
use Illuminate\Database\Schema\Blueprint;

class $MigrationName extends Migration{
    public function up(){
        \$this->db->schema->dropIfExists('${tableName}s');
        \$this->db->schema->create('${tableName}s', function (Blueprint \$table) {
            \$table->id();
            \$table->timestamps();
        });
    }

    public function down(){
        \$this->db->schema->dropIfExists('${tableName}s');
    }
}
");
            fclose($file);
            $output->writeln("<info>$fullMigrationName.php is created succeessfully!<info>");
        }catch(Exception $e){
            $output->writeln("<error>File Not Created: $e</error>");
        }
        return 0;
    }
}