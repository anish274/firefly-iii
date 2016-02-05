<?php
/**
 * BillControllerTest.php
 * Copyright (C) 2016 Sander Dorigo
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */


/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-01-19 at 15:39:27.
 */
class BillControllerTest extends TestCase
{

    /**
     * @covers FireflyIII\Http\Controllers\BillController::create
     * @covers FireflyIII\Http\Controllers\BillController::__construct
     */
    public function testCreate()
    {
        $this->be($this->user());
        $this->call('GET', '/bills/create');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::delete
     */
    public function testDelete()
    {
        $this->be($this->user());
        $this->call('GET', '/bills/delete/1');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::destroy
     */
    public function testDestroy()
    {
        $this->session(['bills.delete.url' => 'http://localhost']);
        $this->be($this->user());
        $this->call('POST', '/bills/destroy/2');
        $this->assertSessionHas('success');
        $this->assertResponseStatus(302);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::edit
     */
    public function testEdit()
    {
        $this->be($this->user());
        $this->call('GET', '/bills/edit/1');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::index
     */
    public function testIndex($range)
    {
        $this->be($this->user());
        $this->call('GET', '/bills');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::rescan
     */
    public function testRescan($range)
    {
        $this->be($this->user());
        $this->call('GET', '/bills/rescan/1');
        $this->assertSessionHas('success');
        $this->assertResponseStatus(302);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::show
     */
    public function testShow($range)
    {
        $this->be($this->user());
        $this->call('GET', '/bills/show/1');
        $this->assertResponseStatus(200);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::store
     * @covers FireflyIII\Http\Requests\BillFormRequest::authorize
     * @covers FireflyIII\Http\Requests\BillFormRequest::getBillData
     * @covers FireflyIII\Http\Requests\BillFormRequest::rules
     */
    public function testStore()
    {
        $this->session(['bills.create.url' => 'http://localhost']);
        $args = [
            'name'                          => 'Some test',
            'match'                         => 'words',
            'amount_min'                    => 10,
            'amount_max'                    => 100,
            'amount_currency_id_amount_min' => 1,
            'amount_currency_id_amount_max' => 1,
            'date'                          => '20160101',
            'repeat_freq'                   => 'monthly',
            'skip'                          => 0,
        ];

        $this->be($this->user());
        $this->call('POST', '/bills/store', $args);
        $this->assertSessionHas('success');

        $this->assertResponseStatus(302);
    }

    /**
     * @covers FireflyIII\Http\Controllers\BillController::update
     * @covers FireflyIII\Http\Requests\BillFormRequest::authorize
     * @covers FireflyIII\Http\Requests\BillFormRequest::getBillData
     * @covers FireflyIII\Http\Requests\BillFormRequest::rules
     */
    public function testUpdate()
    {
        $this->session(['bills.edit.url' => 'http://localhost']);
        $args = [
            'id'                            => 1,
            'name'                          => 'Some test',
            'match'                         => 'words',
            'amount_min'                    => 10,
            'amount_max'                    => 100,
            'amount_currency_id_amount_min' => 1,
            'amount_currency_id_amount_max' => 1,
            'date'                          => '20160101',
            'repeat_freq'                   => 'monthly',
            'skip'                          => 0,
        ];

        $this->be($this->user());
        $this->call('POST', '/bills/update/1', $args);
        $this->assertSessionHas('success');

        $this->assertResponseStatus(302);
    }
}
