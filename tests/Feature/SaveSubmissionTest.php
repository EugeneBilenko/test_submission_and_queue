<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SaveSubmissionTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * Test successful form submission.
     *
     * @return void
     */
    public function test_successful_form_submission()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/save', $data);

        $response->assertStatus(200);

        $response->assertJson([
            'status' => 'success',
            'data' => $data,
        ]);

        $this->assertDatabaseHas('submissions', $data);
    }

    /**
     * Test form submission with missing fields.
     *
     * @return void
     */
    public function test_form_submission_with_missing_fields()
    {
        $data = [
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.',
        ];

        $response = $this->postJson('/api/save', $data);

        $response->assertStatus(400);

        $response->assertJsonValidationErrors(['name']);
    }
}
