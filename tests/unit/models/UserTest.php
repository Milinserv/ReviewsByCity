<?php

namespace tests\unit\models;

use app\models\Author;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        verify($user = Author::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(Author::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify($user = Author::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(Author::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername()
    {
        verify($user = Author::findByUsername('admin'))->notEmpty();
        verify(Author::findByUsername('not-admin'))->empty();
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = Author::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();        
    }

}
