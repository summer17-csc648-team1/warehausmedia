<?php
use Migrations\AbstractMigration;

class UpdateUser extends AbstractMigration
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
        //change datatype size of pwd
        $usertable = $this->table('Users');
        $usertable->changeColumn('Password', 'string', [
            'limit' => 255
        ]);
        
        $usertable->update();
    }
}
