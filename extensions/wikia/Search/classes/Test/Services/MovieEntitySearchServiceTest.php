<?php
namespace Wikia\Search\Test\Services;

use Wikia\Search\Services\MovieEntitySearchService;

class MovieEntitySearchServiceTest extends SearchServiceBaseTest {

	public function setUp() {
		parent::setUp();
		$this->getStaticMethodMock( '\WikiFactory', 'getCurrentStagingHost' )
			->expects( $this->any() )
			->method( 'getCurrentStagingHost' )
			->will( $this->returnCallback( function () {
				return 'newhost';
			} ) );
	}

	/**
	 * @test
	 * @dataProvider testsProvider
	 */
	public function shouldReturnCorrectFormat(
		callable $paramsFunction,
		$expectedOutput,
		$request = null,
		$response = null
	) {
		$service = new MovieEntitySearchService( $this->useSolariumMock( $request, $response ) );
		$res = $paramsFunction( $service );
		$this->assertEquals( $expectedOutput, $res );
	}

	public function testsProvider() {
		return [
			[ function ( MovieEntitySearchService &$svc ) {
				return $svc->setLang( 'en' )->query( 'The Rains of Castamere' );
			},
				$this->getBaseOutput(), $this->getBaseRequest(), $this->getMockResponse() ],
		];
	}

	/**
	 * Sets solr response body
	 * @return string Solr response body
	 */
	protected function getMockResponse() {
		return '{"responseHeader":{"status":0,"QTime":6,"params":{"pf":"titleStrict^8 title_en^2 redirect_titles_mv_en^2","fl":"*,score","start":"0","q":"+(\"The Rains of Castamere\") AND +(wid:130814)","qf":"titleStrict title_en redirect_titles_mv_en","wt":"json","fq":["+(ns:0)","+(article_type_s:tv_episode)"],"defType":"edismax","rows":"1"}},"response":{"numFound":1,"start":0,"maxScore":12.947323,"docs":[{"wid":"1","host":"gameofthrones.wikia.com","pageid":13508,"id":"130814_13508","title_en":"The Rains of Castamere (episode)","url":"http://gameofthrones.wikia.com/wiki/The_Rains_of_Castamere_(episode)","article_quality_i":99,"score":12.947323}]}}';
	}

	protected function getBaseOutput() {
		return [
			'articleId' => 13508,
			'title' => "The Rains of Castamere (episode)",
			'url' => "http://newhost/wiki/The_Rains_of_Castamere_(episode)",
			'quality' => 99,
			'wikiId' => 1,
			'contentUrl' => 'http://newhost/api/v1/Articles/AsSimpleJson?id=13508'
		];
	}

	protected function getBaseRequest() {
		$mockQuery = new \Solarium_Query_Select();

		$mockQuery->setQuery( '+("The Rains of Castamere")' );
		$mockQuery->setRows( 1 );

		$mockQuery->createFilterQuery( 'ns' )->setQuery( '+(ns:0)' );
		$mockQuery->createFilterQuery( 'type' )->setQuery( '+(article_type_s:movie)' );
		$mockQuery->createFilterQuery( 'lang' )->setQuery( '+(lang:en)' );
		$mockQuery->createFilterQuery( 'excl' )->setQuery( '-(host:uncyclopedia.wikia.com)' );

		$dismax = $mockQuery->getDisMax();
		$dismax->setQueryParser( 'edismax' );

		$dismax->setQueryFields( 'title_em^10 titleStrict title_en redirect_titles_mv_en' );
		$dismax->setPhraseFields( 'titleStrict^8 title_en^2 redirect_titles_mv_en^2' );

		return $mockQuery;
	}

}