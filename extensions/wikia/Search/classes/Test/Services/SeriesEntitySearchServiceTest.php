<?php
namespace Wikia\Search\Test\Services;

use Wikia\Search\Services\SeriesEntitySearchService;

class SeriesEntitySearchServiceTest extends SearchServiceBaseTest {

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
		$service = new SeriesEntitySearchService( $this->useSolariumMock( $request, $response ) );
		$res = $paramsFunction( $service );
		$this->assertEquals( $expectedOutput, $res );
	}

	public function testsProvider() {
		return [
			[ function ( SeriesEntitySearchService &$svc ) {
				return $svc->setLang( 'en' )->query( 'Big Bang Theory' );
			},
				$this->getBaseOutput(), $this->getBaseRequest(), $this->getMockResponse() ],
		];
	}

	protected function getBaseOutput() {
		return [
			'articleId' => 1880,
			'title' => "The Big Bang Theory",
			'url' => "http://newhost/wiki/The_Big_Bang_Theory",
			'quality' => 99,
			'wikiId' => 4828,
			'contentUrl' => 'http://newhost/api/v1/Articles/AsSimpleJson?id=1880'
		];
	}

	/**
	 * Sets solr response body
	 * @return string Solr response body
	 */
	protected function getMockResponse() {
		return '{"responseHeader":{"status":0,"QTime":90,"params":{"pf":"title_em^8 titleStrict^8 title_en^2 redirect_titles_mv_en^2","fl":"*,score","start":"0","q":"+(\"big bang theory\") AND +(article_quality_i:[20 TO *]) AND +(wid:4828)","qf":"title_em^8 titleStrict title_en redirect_titles_mv_en","qs":"1","wt":"json","fq":["+(ns:(0))","-(is_main_page:true)","+(article_type_s:tv_series)"],"ps":"1","defType":"edismax","rows":"1"}},"response":{"numFound":1,"start":0,"maxScore":15.580387,"docs":[{"nolang_txt":["The Big Bang Theory","The Big Bang Theory","The Big Bang Theory is an American sitcom created by Chuck Lorre and Bill Prady, both of whom serve as executive producers on the show. It premiered on CBS on September 24, 2007, and has run for six seasons and has been renewed for an additional season. Set in Pasadena, California the show is about two fictional Caltech geniuses, one an experimental physicist (Leonard Hofstadter) and the other a theoretical physicist (Sheldon Cooper), who live across the hall from an attractive blonde waitress and aspiring actress (Penny). Leonard and Sheldon\'s geekiness and intellect are contrasted for comic effect with Penny\'s"],"wid":4828,"words":1384,"wiki_images":6050,"wiki_official_b":false,"revcount":130,"id":"4828_1880","is_main_page":false,"wam":95,"pageid":1880,"backlinks":1099,"categories_mv_en":["The Big Bang Theory","The Big Bang Theory Series","Reference Materials","Articles With Photos"],"wiki_description_txt":["The Big Bang Theory Wiki is a site for fans of the popular CBS television series The Big Bang Theory. Here you will find plenty of information on the episodes, characters, cast, crew, and much more."],"touched":"2014-08-04T10:59:49Z","redirect_titles_mv_en":["About","Big Bang Theory"],"ns":0,"wikipages":42251,"wikiviews_weekly":0,"wikiviews_monthly":1336752,"hub":"Entertainment","views":49331,"html_en":"The Big Bang Theory is an American sitcom created by Chuck Lorre and Bill Prady, both of whom serve as executive producers on the show. It premiered on CBS on September 24, 2007, and has run for six seasons and has been renewed for an additional season. Set in Pasadena, California the show is about two fictional Caltech geniuses, one an experimental physicist (Leonard Hofstadter) and the other a theoretical physicist (Sheldon Cooper), who live across the hall from an attractive blonde waitress and aspiring actress (Penny). Leonard and Sheldon\'s geekiness and intellect are contrasted for comic effect with Penny\'s social skills and common sense. An aerospace engineer (Howard Wolowitz) and a particle astrophysicist (Rajesh Koothrappali) are their equally geeky and socially awkward co-workers and friends. They are the kind of \"beautiful minds\" that understand how the universe works, but none of that helps them interact with people, especially women. The show is produced by Warner Bros. Television and Chuck Lorre Productions. In March 2009, it was reported that The Big Bang Theory had been renewed for a third and fourth season by CBS. In August 2009, the sitcom won the best comedy series TCA award and Jim Parsons won the award for individual achievement in comedy. When the third season premiered on September 21, 2009, it ranked as CBS\'s highest-rated show of that evening in the adults 18–49 demographic (4.6/10), along with a then series-high 12.83 million viewers. As of September 2009, The Big Bang Theory airs on CBS on Mondays at 9:30 ET after Two and a Half Men, another show produced by Lorre. On May 19, 2010, it was announced that CBS would be moving the show to Thursdays at 8:00 ET for the 2010–2011 schedule; a position it stills holds as of October, 2013. On January 12, 2011, CBS announced that the show has been renewed for an additional 3 years, extending it through the 2013–2014 season. Several members of the cast stated that the show definitely has the potential to run for 200 episodes. The show is taped at Stage 25, Warner Brothers Burbank Studios, 4000 Warner Boulevard, Burbank, California, USA. Contents[show] Main Cast Main article: List of The Big Bang Theory characters Johnny Galecki as Leonard Leakey Hofstadter, Ph.D. – Leonard is an experimental physicist with an IQ of 173 who received his Ph.D. when he was 24 years old. He shares an apartment with colleague and friend Sheldon Cooper. The writers immediately implied a potential romance between him and neighbor Penny, and their sexual tension is a frequently explored drama. Jim Parsons as Sheldon Lee Cooper, B.S., M.S., M.A., Ph.D., Sc.D. – Originally from East Texas, he was a child prodigy who began college at the age of 11, after completing the fifth grade. As a theoretical physicist, he possesses a master\'s degree, two doctorates, and an IQ of 187. He exhibits a strict adherence to routine; a lack of understanding of irony, sarcasm, and humor. This action may sometimes appear as lack of humility when he\'s just being himself. These characteristics are the main sources of his humor and the basis of a number of episodes. Sheldon shares an apartment with Leonard Hofstadter. Kaley Cuoco as Penny – She is the attractive blonde, \"born and raised in Omaha, Nebraska\", who lives across the hall from Sheldon and Leonard. She hopes for a career in acting, and has been to casting calls and auditions, but has not been successful thus far. To pay the bills, she is a waitress at The Cheesecake Factory. She always liked something about Leonard. Simon Helberg as Howard Joel Wolowitz, M.Eng. – He works as an aerospace engineer. He is Jewish, and lives with his mother. Unlike Sheldon, Leonard, and Raj, Howard lacks a Ph.D. He defends himself by pointing out that he has a master\'s degree in Engineering from the Massachusetts Institute of Technology and the apparatus he designs are built and launched into space, unlike the purely abstract work of his friends. He provides outrageous pick-up lines and fancies himself a ladies man with suitably unimpressed reactions from Penny; however, he has shown limited success with other women. He is a polyglot. Kunal Nayyar as Rajesh Ramayan \"Raj\" Koothrappali, Ph.D. – Rajesh, who originally comes from New Delhi, India, works as a particle astrophysicist at Caltech. He is very shy around women and is physically unable to talk to them unless he drinks alcohol. However, he has had much better luck with women than his overly confident best friend Howard. His parents, Dr. V. M. Koothrappali and Mrs. Koothrappali, are seen via webcam. In the third season, he works for Sheldon because his research has run into a dead-end and he does not want to return to India. Recurring Guest Stars Kevin Sussman as Stuart Sara Gilbert as Leslie Winkle Wil Wheaton as himself John Ross Bowie as Barry Kripke Margo Harshman as Alex Jensen Laurie Metcalf as Mary Cooper Christine Baranski as Beverly Hofstadter Joshua Malina as President Siebert Mark Harelik as Eric Gablehauser Kate Micucci as Lucy Aarti Mann as Priya Koothrappali Production history The show\'s initial pilot, developed for the 2006–07 television season, was substantially different from its current form. Only Johnny Galecki and Jim Parsons were in the cast, and the female lead, Katie, was envisioned as \"a street-hardened, tough-as-nails woman with a vulnerable interior\". Katie was played by actress Amanda Walsh They also had a female friend called Gilda (played by Iris Bahr). The show\'s original theme music was also different, using Thomas Dolby\'s hit \"She Blinded Me With Science\". The show was not picked up, but the creators were given an opportunity to revise the show, bringing in the remaining leading cast and retooling the show to its current format. The original unaired pilot has never been released on any official format, but copies are available on the Internet. On the evolution of the show, Lorre said \"We did the \'Big Bang Pilot\' about two and a half years ago, and it sucked, but there were two remarkable things that worked perfectly, and that was Johnny and Jim. We rewrote the thing entirely, and then we were blessed with Kaley and Simon and Kunal.\" As to whether the world will ever see that original pilot, maybe on a DVD, Lorre said \"Wow that would be something, we will see. Show your failures...\" The second pilot of The Big Bang Theory was directed by James Burrows, who did not continue with the show. This reworked pilot led to a 13-episode order by CBS on May 14, 2007. Prior to its airing on CBS, the pilot episode was distributed on iTunes free of charge. The show premiered September 24, 2007, and was picked-up for a full 22-episode season on October 19, 2007. Production on the show was halted on November 6, 2007 due to the Writers Guild of America strike, returning on March 17, 2008 in an earlier time slot and with nine new episodes. After the strike ended, the show was picked up for a second season airing in the 2008–2009 season, premiering in the same time slot on September 22, 2008. With increasing ratings, the show received a two-year renewal through the 2010–11 season. David Saltzberg, a professor of physics and astronomy at the University of California, Los Angeles, checks scripts and provides dialogue, math equations, and diagrams used as props. According to executive producer/co-creator Bill Prady, \"We\'re working on giving Sheldon an actual problem that he\'s going to be working on throughout the first season so there\'s actual progress to the boards ... We worked hard to get all the science right.\" The lead characters are named Sheldon and Leonard after actor, director, and producer Sheldon Leonard. . With the exception of the Pilot, the title of every episode starts with \"The\", and is then is followed by a descriptive word and a scientific term or principle. Through the end of the seventh season, 106 scientific terms were used with the terms \"Excitation\", “Reaction\" and \"Vortex\" used most often at four times. Production costs For the first three seasons, Johnny Galecki, Kaley Cuoco, and Jim Parsons, the three main stars of the show, received at most $60,000 per episode. The salary for the three went up to $200,000 per episode for the fourth season. According to their contracts, their pay per episode will go up an additional $50,000 per episode in each of the following three seasons, culminating in $350,000 per episode in the seventh season. Opening Theme - History of Everything Main article: The Big Bang Theory (Theme Song) Barenaked Ladies wrote and recorded the show\'s theme song, which describes the history of the universe and the Earth since the dawn of time (according to the eponymous theory). Ed Robertson, a lead singer and guitarist in the band, was asked by Lorre and Prady to write a theme song for the show. Having been asked to write songs for other films and shows only to have them rejected in favour of another artist\'s, Robertson agreed to write a theme only after learning that he was the sole writer that Lorre and Prady had asked. He drew inspiration from Simon Singh\'s book, Big Bang, which he had just finished reading. On October 9, 2007, a full-length (1 minute and 45 seconds) version of the song was released commercially. In a 2010 issue of TV Guide, the show’s opening title sequence ranked #6 on a list of television\'s top 10 credits sequences, as selected by readers. Episodes Main article: List of The Big Bang Theory episodes DVD releases International broadcast Main article: International broadcasts Syndication In May 2010, it was reported that the show has been picked up for syndication, mainly among Fox\'s O&O group and other local stations, with Warner Bros. Television\'s sister cable network TBS holding the show\'s cable syndication rights. Broadcast of old shows began airing in September 2011. TBS now airs the series in primetime on Tuesdays, Wednesdays, and Thursdays, with evening broadcasts on Saturdays (TBS\'s local sister station in Atlanta also holds local weeknight rights to the series). Although details of the syndication deal have not been revealed, it was reported the deal \"set a record price for a cable off-network sitcom purchase.\" CTV holds national broadcast syndication rights in Canada, while sister cable network The Comedy Network holds cable rights. Online media Warner Brothers Television controls the online rights for the show. Full episodes are available at tv.com, while short clips and recently aired full episodes are available on cbs.com. Full episodes are also available on Sohu.com in China. In Canada, recent episode(s) and pictures are available on CTV.ca. Awards and nominations Ratings U.S. standard ratings The Big Bang Theory has been highly rated since its premiere. During its fourth season, it became television\'s highest rated comedy, just barely beating out eight-year champ Two and a Half Men. However, in the age 14-49 demographic (the show\'s target age range), it was the second highest rated comedy, behind ABC\'s Modern Family. The fifth season opened with viewing figures of over 14 million. UK distribution and ratings The show made its UK debut on Channel 4 on February 14, 2008 bringing in an average audience of 1.0 million viewers. The second episode, shown the following week, also received 1.0 million. For the third episode an average of 1.1 million tuned in. The show is also shown as a \'first-look\' on Channel 4\'s digital offshoot E4, and brings in 400,000 viewers on average. The fifth episode received 880,000 viewers. After the first five episodes, the average number of viewers continues to hover around the 1 million mark. Episode 13 was watched by 1.3 million viewers and was the most watched episode. In December 2008, Virgin Media made the first nine episodes of the first season available to watch on its TV Choice On Demand service, and the rest of Season 1 was made available in January 2009. As of December 5, 2009, all 23 episodes of Season 2 were also made available on Virgin Media TV Choice On Demand Service, but both seasons have now been removed. The third season began airing on E4 and E4 HD on December 17, 2009 at 9:00 p.m., but was on hiatus between February 25, 2010 until May 6, 2010 when the final 11 episodes of the season aired. Season 4 began airing on E4 on November 4, 2010 at 9:00 p.m. It drew 877,000 viewers, with a further 256,000 watching on the E4+1 hour service. This viewership gave the show an overall total of 1.13 million viewers, making it E4\'s most watched program for that week. E4 broke season four after 12 episodes in January 2011. Season four returned on E4 from June 30, 2011 for the remaining episodes. The fifth season began airing at 8:00 p.m. as part of E4 comedy Thursday\'s as a lead-in to Perfect Couples in the UK. Canadian ratings The Big Bang Theory started off quietly in Canada, but managed to garner major success later on in further seasons. The season 4 premiere garnered an estimated 3.1 million viewers across Canada. This week is the largest audience for a sitcom since the series finale of Friends. The Big Bang Theory has pulled ahead and has now become the most watched show in Canada. Gallery Big Bang ala The Simpsons The guys guest starring on Family Guy. Cast and crew (from the beginning of season 6) The TBBT cast - March 2013. Season 6 & 7 opening title photo. Poster. 1 of 6Add photo References The Big Bang Theory Opening cast shot Seasons 6 & 7 Television show Episode Genre Sitcom Format Live-action Created by Chuck Lorre Bill Prady Developed by Chuck Lorre Bill Prady Directed by Mark Cendrowski Starring Johnny Galecki Jim Parsons Kaley Cuoco Simon Helberg Kunal Nayyar Sara Gilbert Melissa Rauch Mayim Bialik Opening theme \"Big Bang Theory Theme\"[1][2] Composed by Barenaked Ladies Country of origin United States No. of seasons 7 No. of episodes 150 (List of episodes) Production Executive producer(s) Chuck Lorre Bill Prady Steven Molaro Producer(s) Faye Oshima Belyeu Editor(s) Peter Chakos Location Studio 25, Warner Brothers Studios Burbank, California Camera setup Multi-camera Running time 19-22 minutes Company Chuck Lorre Productions Warner Bros. Television Broadcast Original channel CBS Picture format 1080i (HDTV) Audio format Dolby Digital 5.1 Original run September 24, 2007 – present Time-slot Thursdays at 8:00 PM Rating TV-PG TV-14 External Links Website Season Episodes Originally Aired DVD Release Date Discs Season Premiere Season Finale Viewers (millions) Rank 18-49 Rating/Share 1 17 2007-08 September 2, 2008 3 September 24, 2007 May 19, 2008 8.34[21] #59[21] 3.3/9 2 23 2008-09 September 15, 2009 4 September 22, 2008 May 11, 2009 10.01[22] #42[22] 3.8/10 3 23 2009-10 September 15, 2010 3 September 21, 2009 May 24, 2010 14.12 #12 5.3/13 (#5)[23] 4 24[24] 2010-11 September 16, 2011 3 September 23, 2010[25] May 19, 2011[26] 13.14 #13 4.4/13 (#7) 5 24 2011-12 September 11, 2012 3 September 22, 2011 May 10, 2012 15.82 #7 5.53/16 6 24 2012-13 September 10, 2013 3 September 27, 2012 May 16, 2013 18.68 #2 6.2/19 7 24 2013-14 September 16, 2014 3 September 26, 2013 May 15, 2014 N/A N/A N/A DVD Name Release dates Ep # Additional Information Region 1 Region 2 Region 4 The Complete First Season September 2, 2008 January 12, 2009 December 9, 2008 17 The three disc box set includes all 17 episodes. The only extra feature is an 18 minute short entitled \"Quantum Mechanics of the Big Bang Theory: Series Cast and Creators on Why It’s Cool to Be a Geek\". Running Time 374 minutes. The Complete Second Season September 15, 2009[27] October 19, 2009[28] March 3, 2010[29] 23 The four disc box set includes all 23 episodes. The Special Features include a Gag Reel, \"Physicist to the Stars: Real-Life Physicist/UCLA professor David Saltzberg\'s consulting relationship to the Show\", and \"Testing the Infinite Hilarity Hypothesis of the Big Bang Theory: Season 2\'s Unique Characters and Characteristics\". The Complete Third Season September 14, 2010[30] September 27, 2010[31] October 13, 2010[32] 23 The three disc box set includes all 23 episodes. Special features include \"Set Tour with Simon and Kunal\", an inside look on the third season and a gag reel. Running Time: 374 minutes. The Complete Fourth Season September 13, 2011[33] September 26, 2011 October 5, 2011 24 The 4-disc box set includes all 24 episodes. Special features include the story behind the show\'s theme song with Barenaked Ladies, cast interviews with each other and a gag reel. Running time: 529 minutes. Also available in Blu-ray as a 2-disc set. The Complete Fifth Season September 11, 2012[34] September 3, 2012 October 1, 2012 24 The three-disc box set includes all 24 episodes. Special features include \"The Big Bang Theory at 100\", a featurette on the show\'s 100th episode, \"The Big Bang Theory\'s Laws of Reflection\", \"Professors of Production\", and a gag reel. Running time: 552 minutes. Also available on Blu-ray/DVD combo pack with UltraViolet download. The Complete Sixth Season September 10, 2013[35] September 2, 2013[36] September 18, 2013 24 The three-disc box set contains all 24 episodes. Special features include \"The Big Bang Theory: The Final Comedy Frontier\", where astronauts Buzz Aldrin and Mike Massimino join the cast to analyze Howard\'s space mission, \"Houston, We Have a Sitcom\", \"Electromagnetism: The Best Relationship Moments in Season 6\", \"The Big Bang Theory at Paleyfest 2013\", and a gag reel. Running time: 477 minutes. Also available on Blu-ray/DVD combo pack with UltraViolet download. Year Result Category Award Show Recipient(s) 2008 Nominated Best Actor in a Comedy Series 1st Ewwy Awards Jim Parsons Nominated Best Actress in a Comedy Series Kaley Cuoco Nominated Best Comedy Series Cast and Crew 2009 Nominated Outstanding Lead Actor in a Comedy Series 61st Primetime Emmy Awards Jim Parsons Nominated Outstanding Guest Actress in a Comedy Series Christine Baranski Nominated Outstanding Art Direction for a Multi-Camera Series Crew Won Outstanding Achievement in Comedy TCA Awards Cast and Crew Won Individual Achievement in Comedy Jim Parsons Nominated Best television comedy or musical series Satellite Awards Cast and Crew Nominated Best actor in a comedy or musical series Jim Parsons Won The best 10 Television Programs of the yearAmerican Film Institute Cast and Crew Won Best Lead Actress in a Comedy Series 2nd Ewwy Awards Kaley Cuoco Nominated Best Comedy Series Cast and Crew 2010 Won Favourite TV Comedy 36th People\'s Choice Awards Nominated Favourite TV Comedy Actor Jim Parsons Nominated Outstanding Achievement in Comedy TCA Awards Cast and Crew Nominated Individual Achievement in Comedy Jim Parsons Nominated Choice TV Comedy Teen Choice Award Cast and Crew Nominated Choice TV Actor: Comedy Jim Parsons Nominated Choice TV Actress: Comedy Kaley Cuoco Nominated Choice Scene Stealer: Male Johnny Galecki Nominated Choice Scene Stealer: Male Simon Helberg Nominated Outstanding Art Direction For A Multi-Camera Series 62nd Primetime Emmy Awards Cast and Crew Nominated Outstanding Makeup For A Multi-Camera Series Or Special (Non-Prosthetic) Cast and Crew Won Outstanding Lead Actor In A Comedy Series Jim Parsons Nominated Outstanding Guest Actress In A Comedy Series Christine Baranski Nominated Outstanding Technical Direction, Camerawork, Video Control For A Series Cast and Crew Nominated Best Supporting Actor in a Comedy Series 3rd Ewwy Awards Kunal Nayyar Nominated Best Comedy Series Cast and Crew 2011 Nominated Best Series – Musical or Comedy 68th Golden Globe Awards Won Best performance in a television series – musical or comedy Jim Parsons Nominated Favourite TV Comedy People\'s Choice Awards] Nominated Favourite TV Comedy Actor Jim Parsons Nominated Choice TV: Comedy Teen Choice Awards Nominated Choice TV: Actor Comedy Jim Parsons Nominated Choice TV: Actress Comedy Kaley Cuoco Nominated Outstanding Art Direction For A Multi-Camera Series 63rd Primetime Emmy Awards Cast and Crew Nominated Outstanding Picture Editing For A Comedy Series (Single or Multi-Camera) Cast and Crew Nominated Outstanding Lead Actor In A Comedy Series Johnny Galecki Nominated Outstanding Lead Actor In A Comedy Series Jim Parsons Nominated Outstanding Comedy Series Cast & Crew Season Timeslot (ET) Season premiere Season finale TV season Rank Avg. Viewers (in millions) 1 Monday 8:30 P.M. (September 24 – November 12, 2007) Monday 8:00 P.M. (March 17 – May 19, 2008) September 24, 2007 May 19, 2008 2007–08 #59 8.31[45] 2 Monday 8:00 P.M. (September 22, 2008 – May 11, 2009) Monday 9:30 P.M. (February 9, 2009) September 22, 2008 May 11, 2009 2008–09 #44 10.00[46] 3 Monday 9:30 P.M. (September 21, 2009  – May 24, 2010) Monday 9:00 P.M. (May 3, 2010) September 21, 2009 May 24, 2010 2009–10 #12 14.14[47] 4 Thursday 8:00 P.M. (September 23, 2010 – May 19, 2011) September 23, 2010 May 19, 2011 2010–11 #15 13.14[48] 5 Thursday 8:00 P.M. (September 22, 2011 – May 17, 2012) September 22, 2011 May 17, 2012 2011–12 #9 16.35[49] ↑ As sold on iTunes Music Store ↑ As sold on Amazon.com ↑ Big Bang Theory\': \'We didn\'t anticipate how protective the audience would feel about our guys ↑ Breaking News — Development Update: May 22–26 (Weekly Round-Up). TheFutonCritic.com. May 2, 2009 ↑ CCI: \"The Big Bang Theory\". Comic Book Resources. July 31, 2008. ↑ CBS PICKS UP \'BANG,\' \'POWER\' PLUS FOUR DRAMAS. The Futon Critic. May 14, 2007 ↑ CBS. October 19, 2007. Breaking News — Cbs Gives Freshman Comedy \"The Big Bang Theory\" And Drama \"The Unit\" Full Season Orders. ↑ \"The Big Bang Theory\" And \"How I Met Your Mother\" to Swap Time Periods. The Futon Critic; CBS. February 20, 2008. ↑ CBS Sets Series Return Dates. February 13, 2008 ↑ Production Stops on at least 6 Sitcoms. November 6, 2007. ↑ [CBS Picks Up 11 Series. February 15, 2008. The Futon Critic. ↑ Big Bang Theory: Deal Is Done for Two More Seasons!. November 3, 2009 ↑ Andreeva, Nellie. CBS renews \'Men,\' \'Big Bang\'. ↑ \'Big Bang Theory\': \'We didn\'t anticipate how protective the audience would feel about our guys\' ↑ \"The Big Bang Theory\" Lead Stars Score Big Raise ↑ EXCLUSIVE: \'Big Bang Theory\' Stars Score Huge Paydays After Hardball Bargaining; ↑ Barenaked Ladies’ Ed Robertson talks \"Big Bang Theory\" theme song ↑ Barenaked Ladies Talk about Big Bang Theme Song ↑ Big Bang Theory Theme ↑ Tomashoff, Craig. \"Credits Check\" TV Guide, October 18, 2010, Pages 16–17 ↑ 21.0 21.1 ABC Medianet. SEASON PROGRAM RANKINGS (THROUGH 5/25) ↑ 22.0 22.1 ABC Medianet. ↑ Nellie Andreeva (May 27, 2010). \"Full Series Rankings For The 2009-10 Broadcast Season\". Deadline Hollywood . http://www.deadline.com/2010/05/full-series-rankings-for-the-2009-10-broadcast-season. Retrieved on June 7, 2010.  ↑ \"CBS - Primetime Calender - September 6 - October 29\". Docstoc . http://www.docstoc.com/docs/54323968/CW---Primetime-Calender---September-6---October-29. Retrieved on September 9, 2010.  ↑ \"CBS ANNOUNCES 2010-2011 PREMIERE DATES\". The Futon Critic . July 22, 2010. http://www.thefutoncritic.com/news/2010/07/22/cbs-announces-2010-2011-premiere-dates/20100722cbs02/. Retrieved on July 22, 2010.  ↑ \"CBS Announces Season Finale Dates for the 2010-11 Season\". The Futon Critic . http://www.thefutoncritic.com/news/2011/03/28/cbs-announces-season-finale-dates-for-the-2010-11-season-830412/20110328cbs06/. Retrieved on March 28, 2011.  ↑ \"The Big Bang Theory Season 2 DVD coming in September\" ↑ \"Big Bang Theory — Season 2 [DVD: Amazon.co.uk: DVD\"]. ↑ \"The Big Bang Theory – Complete 2nd Season (4 Disc Set)\" ↑ Wbshop. ↑ \"The Big Bang Theory – Season 3 DVD\". Amazon.co.uk. ↑ EZYDVD. ↑ The Big Bang Theory: The Complete Fourth Season DVD - Warner Bros.: WBshop.com - The Official Online Store of Warner Bros. Studios ↑ \"The Big Bang Theory: The Complete Fifth Season (Blu-ray)\". Warner Bros. http://www.wbshop.com/product/the+big+bang+theory+the+complete+fifth+season+bluray+1000246644.do?sortby=ourPicks&from=Search. Retrieved on August 11, 2012.  ↑ \"The Big Bang Theory – Blu-rays, DVDs for \'The Complete 6th Season\': Possible Date, Cost, Box Art\". tvshowsondvd.com. http://www.tvshowsondvd.com/news/Big-Bang-Theory-Season-6/18132. Retrieved on March 1, 2013.  ↑ \"The Big Bang Theory – Season 6 [DVD]: Amazon.co.uk: Johnny Galecki, Jim Parsons, Kaley Cuoco, Simon Helberg: Film & TV\". Amazon.co.uk. http://www.amazon.co.uk/The-Big-Bang-Theory-Season/dp/B00766F6QY/ref=sr_1_3?ie=UTF8&qid=1356043937&sr=8-3. Retrieved on December 26, 2012.  ↑ TBS Fall 2011 Schedule; ION Adds Monk, Psych This Month, House in Fall 2012 - SitcomsOnline.com News Blog ↑ ‘The Big Bang Theory’ Gets Syndication Deal ↑ Company credits for \"The Big Bang Theory\" ↑ Why CBS pulled The Mentalist from CBS.com ↑ The Big Bang Theory: Watch Episodes and Video and Join the Ultimate Fan Community ↑ The Big Bang Theory ↑ CTV Big Bang Theory ↑ Thursday Finals: \'Big Bang Theory,\' \'The X Factor,\' \'Parks & Recreation\' and \'Whitney\' Adjusted Up|publisher=TV by the Numbers ↑ SEASON PROGRAM RANKINGS (THROUGH 5/25) ↑ ABC Medianet ↑ Final 2009–10 Broadcast Primetime Show Average Viewership ↑ 2010-11 Season Broadcast Primetime Show Viewership Averages - Ratings | TVbytheNumbers ↑ Nielsen Television - TV Ratings for Primetime: 2011-12 Season-to-Date ↑ 14, 2008 Overnights February 14, 2008 ↑ Weekly Top 10 Programs ↑ No Theory: Big Bang Canada\'s No. 1 Show This page uses Creative Commons Licensed content from Wikipedia (view authors). The title card for the original 2006 pilot Big Bang set resides on Stage 25 - see stage history plaque.","wikiarticles":763,"title_en":"The Big Bang Theory","page_images":9,"host":"bigbangtheory.wikia.com","wiki_hot_b":false,"iscontent":true,"lang":"en","wiki_new_b":false,"titleStrict":"The Big Bang Theory","created":"2009-02-18T09:34:15Z","url":"http://bigbangtheory.wikia.com/wiki/The_Big_Bang_Theory","activeusers":70,"wiki_promoted_b":false,"wikititle_en":"The Big Bang Theory Wiki","indexed":"2014-08-04T11:00:55.368Z","is_closed_wiki":false,"article_quality_i":99,"article_type_s":"tv_series","redirect_titles_mv_em":["About","Big Bang Theory"],"title_em":"The Big Bang Theory","headings_mv_en":["Main Cast","Recurring Guest Stars","Production history","Production costs","Opening Theme - History of Everything","Episodes","DVD releases","International broadcast","Syndication","Online media","Awards and nominations","Ratings","U.S. standard ratings","UK distribution and ratings","Canadian ratings","Gallery","References"],"snippet_s":"The Big Bang Theory is an American sitcom created by Chuck Lorre and Bill Prady, both of whom serve as executive producers on the show. It premiered on CBS on September 24, 2007, and has run for six seasons and has been renewed for an additional season. Set in Pasadena, California the show is about two fictional Caltech geniuses, one an experimental physicist (Leonard Hofstadter) and the other a theoretical physicist (Sheldon Cooper), who live across the hall from an attractive blonde waitress and aspiring actress (Penny). Leonard and Sheldon\'s geekiness and intellect are contrasted for comic effect with Penny\'s social skills and common sense. An aerospace engineer (Howard Wolowitz) and a particle astrophysicist (Rajesh Koothrappali) are their equally geeky and socially awkward co-workers and friends. They are the kind of \"beautiful minds\" that understand how the universe works, but none of that helps them interact with people, especially women.","_version_":1475503920160702464,"score":15.580387}]}}';
	}

	protected function getBaseRequest() {
		$mockQuery = new \Solarium_Query_Select();

		$mockQuery->setQuery( '+("Big Bang Theory")' );
		$mockQuery->setRows( 1 );

		$mockQuery->createFilterQuery( 'ns' )->setQuery( '+(ns:(0))' );
		$mockQuery->createFilterQuery( 'main_page' )->setQuery( '-(is_main_page:true)' );
		$mockQuery->createFilterQuery( 'type' )->setQuery( '+(article_type_s:tv_series)' );

		$dismax = $mockQuery->getDisMax();
		$dismax->setQueryParser( 'edismax' );

		$dismax->setQueryFields( 'title_em^8 titleStrict title_en redirect_titles_mv_en' );
		$dismax->setPhraseFields( 'title_em^8 titleStrict^8 title_en^2 redirect_titles_mv_en^2' );

		$dismax->setQueryPhraseSlop( 1 );
		$dismax->setPhraseSlop( 1 );

		return $mockQuery;
	}
}