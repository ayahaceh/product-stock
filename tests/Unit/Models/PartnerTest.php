<?php

namespace Tests\Unit\Models;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\BrowserKitTest as TestCase;

class PartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_partner_has_name_link_attribute()
    {
        $partner = Partner::factory()->create();

        $this->assertEquals(
            link_to_route('partners.show', $partner->name, [$partner], [
                'title' => __(
                    'app.show_detail_title',
                    ['name' => $partner->name, 'type' => __('partner.partner')]
                ),
            ]), $partner->name_link
        );
    }

    /** @test */
    public function a_partner_has_belongs_to_creator_relation()
    {
        $partner = Partner::factory()->make();

        $this->assertInstanceOf(User::class, $partner->creator);
        $this->assertEquals($partner->creator_id, $partner->creator->id);
    }
}
