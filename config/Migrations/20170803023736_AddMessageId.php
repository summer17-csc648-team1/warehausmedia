<?php
use Migrations\AbstractMigration;

class AddMessageId extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('Messages');
        $table->addColumn('MessageID', 'integer')
            ->addPrimaryKey('MessageID')
            ->update();
    }
}

?>