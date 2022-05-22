<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'detail' => "
          <p>
            Creative IT is an institution where empowering the community for an
            excellent standard of learning is what we desire. We endeavor for
            the continuous improvement of our leaders who will work for
            constructing a better future. The institute is dedicated to serving
            the quality training programs under ISO 9001: 2015 certification
            which remarks us in the IT world. We will continue to share our
            knowledge for contributing to the success of individuals and to
            serve society with the best interest.
          </p>
          <p>
            We are committed to providing our students with a platform where
            superiority is the mantra. We nurture the young talent by sharing
            knowledge, providing supports in learning techniques, co-operating
            them for international standard projects, making successful
            freelancers and driving our youth towards a world of
            entrepreneurship and thus reducing inequalities. Our culture is
            important to us and our team of experts drives our culture. The
            skilled human resource make our deliverables valuable that really
            helps us to set our standard internationally.
          </p>
          <p>
            In this fast-paced digital world, achieving in career and reaching
            in targeted goal is depending on the proper execution of planning,
            implementing and sustaining changes. So getting there with an
            institution like us will be your wise choice. Your great experience
            of learning influences our way of training and thus we serve our
            students and engage with our commitments. Here we invite you to come
            and join us to have a change in the result of your life and thus we
            would be grateful to know you and to strengthen a long-lasting
            relationship.
          </p>",
            'mission' => "
          <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
          ",
            'vission' => "
          <p>To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
                <p>
                  To empower the community by ensuring state of the art method
                  which strengthens the belief in quality learning.
                </p>
          ",
            'img' => 'frontend/image/mission.webp',
        ]);
    }
}
