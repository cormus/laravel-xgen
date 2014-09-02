<?php
/**



$('.jogos li .itens').remove();
  var games = [];
$('.jogos li a').each(function(i, v){
        games.push({name:$(v).html(), id_consoles:8, created_at:'2014-07-13 00:00:00', updated_at:'2014-07-13 00:00:00'});
  });
$.post( "http://www.cormus.com.br/colecao/public/cadastre-game", {games:games}, function( data ) {
  console.log(data);
});



 */

/*
 * - clicar em produto, listar usuários que tem o mesmo
 * - clicar em produto mostrar média de valor
 * - estimativa de raridade
 * - vender/aceitar ofertas/ou não
 * - reputação de compra
 * - reputação de melhor coleção
 * 
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
| 
| http://laravel.com/docs/routing
|
*/

// Todas as outras rotas:
//Route::get('/login',  'AuthController@loginForm');
//Route::post('/login', 'AuthController@login');
//Route::get('/logout', 'AuthController@logout');
//Route::get('/auth/passwordReset/{token}',  'AuthController@passwordReset');
//Route::post('/auth/recoverPassword',       'AuthController@recoverPassword');
//Route::post('/auth/passwordReset/{token}', 'AuthController@passwordReset');


//cadastra os jogos vindos de outros sites
header('Access-Control-Allow-Origin: *');
Route::post('/cadastre-game', function()
{
    $updates = Request::get('games', null);
    if($updates)
    {
        $db      = DB::table('cormus_games');
        $return  = $db->insert($updates);
    }
});



/*
Route::any('/cadastre-game', function()
{
$list = "102 Dalmatians: Puppies to the Rescue<br />18 Wheeler: American Pro Trucker<br />21: Two One<br />4 Wheel Thunder<br />4x4 Evolution<br />90 Minutes: Sega Championship Football<br />Advanced Daisenryaku 2001<br />Advanced Daisenryaku: Europe no Arashi - Deutsch Dengeki Sakusen<br />Aero Dancing: Jikai Saku Made Matemasen<br />Aero Dancing: Todoroki Taityou No Himitsu Disc<br />Aero Dancing: Todoroki Tsubasa No Hatsu Hikuo<br />Aero Dancing i<br />AeroWings<br />AeroWings 2: Airstrike<br />After<br />Aikagi<br />Air<br />Akihabara Dennou-gumi Pata Pies!<br />Alien Front Online<br />Alone in the Dark: The New Nightmare<br />Angel Present<br />Angel Wish<br />Animastar<br />Aqua GT<br />Armada<br />Army Men: Sarge's Heroes<br />Atari Anniversary Edition<br />Atelier Marie &amp; Elie<br />Atsumare! Guru Guru Onsen<br />Atsumare! Guru Guru Onsen 3<br />Atsumare! Guru Guru Onsen BB<br />Atsumare! Guru Onsen 2<br />Baldr Force EXE<br />Bang! Gunship Elite<br />Bangai-O<br />Bass Rush Dream<br />Battle Beaster<br />Bikkuriman 2000<br />Black/Matrix Advanced<br />Blue Sky Blue<br />Blue Steel Variable Formula: Space Griffon<br />Blue Stinger<br />Blue Submarine No.6: Time and Tide<br />Bokomu No Tatsujin<br />Boku Doraemon<br />Boku No Tennis Jinsei<br />Bokuto, Bokurano Natsu<br />BOMBER hehhe!<br />Bomberman Online<br />Border Down<br />Bounty Hunter Sarah<br />Buggy Heat<br />Bust-A-Move 4<br />Buzz Lightyear of Star Command<br />Caesars Palace 2000: Millennium Gold Edition<br />Cafe Little Wish Mahou No Recipe<br />Candy Stripe<br />Cannon Spike<br />Canvas: Motif of Sepia Color<br />Capcom vs. SNK: Millennium Fight 2000<br />Capcom vs. SNK 2: Millionaire Fighting 2001<br />Capcom vs. SNK: Millennium Fight 2000 Pro<br />Card Capter Sakura: Tomoyo No Video Daisakusen<br />Card of Destiny<br />Castle Fantasia Seima Taisen<br />Centipede<br />Championship Surfer<br />Chaos Field<br />Charge'N Blast<br />Checkicco<br />Cherry Blossom<br />Chicken Run<br />Cho Hatsumei Boy Kanipan<br />Christmas Seaman<br />Chu Chu Rocket<br />Cleopatra Fortune<br />Close to: Inori no Oka<br />Coaster Works<br />Comic Party<br />Confidential Mission<br />Conflict Zone<br />Cool Cool Toon<br />Cool Herders<br />Cosmic Smash<br />CR Hissatsu Shigotonin<br />Crazy Taxi<br />Crazy Taxi 2<br />Culdcept Second<br />Cyber Angel Mahjong Battle Shangri-La<br />Cyber Troopers Virtual-On: Oratorio Tangram<br />D Vine (Luv)<br />D2<br />Dabitsuku<br />Daisessen<br />Dance Dance Revolution 2nd Mix Dreamcast Edition<br />Dance Dance Revolution Club Version Dreamcast Edition<br />Dancing blade Katteni Momo Tenshi<br />Dancing blade Katteni Momo Tenshi II<br />Dave Mirra Freestyle BMX<br />Daytona USA 2001<br />Dead or Alive 2<br />Deadly Skies<br />Death Crimson 2<br />Death Crimson OX<br />Deep Fighter<br />Dejiko No Maibura<br />Demolition Racer: No Exit<br />Denpashonenteki Kenshoseikatsu Soft Nasubi No Heya<br />Densha de Go! 2: Kousoku-hen 3000 Bandai<br />Derby Tsuku 2<br />deSpiria<br />Di Gi Charat Fantasy<br />Digital Keiba Shinbun My Trackman<br />Dino Crisis<br />Disney's Dinosaur<br />Doguu Senki: Haoh<br />Doki Doki Idol Star Seeker Remix<br />Donald Duck Qu@ck Att@ck*!<br />Dousoukai 2 again & refrain<br />DPS Heartbreak Diary<br />Dragon Riders: Chronicles of Pern<br />Dragon's Blood<br />Dream In Pandra's Box<br />Dreamstud!o<br />Drill<br />Ducati World Racing Challenge<br />DUX<br />Dynamite Cop<br />Ecco the Dolphin: Defender of the Future<br />ECW: Anarchy Rulz<br />ECW: Hardcore Revolution<br />Eldorado Gate Vol.1<br />Eldorado Gate Vol.2<br />Eldorado Gate Vol.3<br />Eldorado Gate Vol.4<br />Eldorado Gate Vol.5<br />Eldorado Gate Vol.6<br />Eldorado Gate Vol.7<br />Elemental Gimmick Gear<br />Eisei Meijin 3: Game Creator Yoshimura Nobuhiro no Zunou<br />Elysion: Eternal Sanctuary<br />Erde: Nezu no Ki no Shita de<br />Es<br />ESPN International Track and Field<br />ESPN NBA 2 Night<br />European Super League<br />Eve Zero: Ark of the Matter<br />Ever 17: the out of infinity<br />Evil Dead: Hail to the King<br />Evil Twin<br />Evolution<br />Evolution 2<br />Exodus Guilty NEOS<br />Exhibition of Speed<br />Extreme Sports<br />F1 Racing Championship<br />F1 World Grand Prix<br />F1 World Grand Prix II<br />F355 Challenge<br />Fast Striker<br />Fatal Fury: Mark of the Wolves<br />Feet of Fury<br />Fighting Force 2<br />Fighting Vipers 2<br />Fire Pro-wrestling D<br />First Kiss Story 2<br />Flag to Flag<br />Floigan Brothers<br />For Symphony: With All One's Heart<br />Fragrance Tale<br />Frame Gride<br />Freestyle Scooter<br />Frogger 2: Swampy's Revenge<br />Fur Fighters<br />Fushigi no Dungeon: Furai no Shiren Gaiden: Onnakenshi Asuka Kenzan!<br />Gaia Master: Kessen! Seiki Oh Densetsu<br />Gakkyuu Oh Yamazaki<br />Gauntlet Legends<br />Get!! Colonies<br />Giant Gram: All Japan Pro Wrestling 2<br />Giant Gram 2000: All Japan Pro Wrestling 3<br />Giant Killers<br />Giga Wing<br />Giga Wing 2<br />Godzilla Generations<br />Godzilla Generations Maximum Impact<br />Golem No Maigo<br />Golf Shiyouyo Courses Data Adventure Edition<br />Golf Shiyouyo Kouryaku Pak<br />Grand Theft Auto 2<br />Grandia II<br />Grauen No Torikago Kapitel 1: Keiyaku<br />Grauen No Torikago Kapitel 2: Torikago<br />Grauen No Torikago Kapitel 3: Kansei<br />Grauen No Torikago Kapitel 4: Kaikou<br />Grauen No Torikago Kapitel 5: Shokuzai<br />Grauen No Torikago Kapitel 6: Senritsu<br />The Grinch<br />Guilty Gear X<br />Gunbird 2<br />Gundam: Side Story 0079<br />Gundam Battle Online<br />Hanagumi Taisen Columns 2<br />Hang the DJ<br />Happy Breeding<br />Happy Lesson<br />Happy Lesson: First Lesson<br />Hausame Youbi<br />Headhunter<br />Heavy Metal Geomatrix<br />Heisei Mahjong-Shou<br />Hello Kitty Dream Passport<br />Hello Kitty no Lovely Fruit Park<br />Hello Kitty no Magical Block<br />Hello Kitty no Garden Panic<br />Hello Kitty no Waku Waku Cookies<br />Hello Kitty no Otonaru Mail<br />Hidden &amp; Dangerous<br />Himitsu: Yui Ga Ita Natsu<br />Himitsu Original Sound Track<br />Historical Mystery Adventure Troia 1186 B.C.<br />The House of the Dead 2<br />Hoyle Casino<br />Hundred Swords<br />Hydro Thunder<br />Idol Janshi wo Tsukucchaou<br />Ikaruga<br />Illbleed<br />Incoming<br />Industrial Spy: Operation Espionage<br />Inhabitants<br />Interlude<br />Irides: Master of Blocks<br />Iris<br />Iron Aces<br />Izumo<br />Jahmong<br />Jeremy McGrath Supercross 2000<br />Jet Coaster Dream 2<br />Jet Set Radio<br />Jikkyo Powerful Pro Yakyu: Dream Edition<br />Jimmy White's 2: Cueball<br />Jinsei Game for Dreamcast<br />Jissen Pchislo Hissyouhou@Vpachi<br />JoJo's Bizarre Adventure<br />July<br />Kaen Seibo: The Virgin On Megiddo<br />Kaito Abricot<br />Kanaria: Kono Omoide o Uta Ni Nosete<br />Kanon<br />Kao the Kangaroo<br />Karous<br />Kaze no Uta<br />Kidou Senshi Gundam: Renpou Vs Zeon DX<br />Kidou Senshi Gundam Gaiden: Giren No Yabou Zeon No Keifu<br />Kimiga Nozomu Eien<br />The King of Fighters '99 Evolution<br />The King of Fighters: Dream Match 99<br />The King of Fighters 2000<br />The King of Fighters 2001<br />The King of Fighters 2002<br />Kiss Psycho Circus: The Nightmare Child<br />Kita He: Photo Memories<br />Kita He: White Illumination<br />Kitahe White Illumination Pure Song and Pictures<br />Kitaihei Gold<br />KiteretsuBoy's Gangagan<br />Konohana 2: Todokanai Requiem 2<br />Konohana: True Report<br />Kuon no Kizuna Sairinsyo<br />L.O.L: Lack of Love<br />Lake Masters Pro Dreamcast Plus<br />Langrisser Millennium<br />The Last Blade 2: Heart of the Samurai<br />Last Hope<br />Last Hope: Pink Bullets<br />Le Mans 24 Hours<br />Legacy of Kain: Soul Reaver<br />Let's Make J. League Professional Soccer Club!<br />Let's Make J. League Professional Soccer Club!: Saka-Tsuku Special Edition<br />Let's Make J. League Professional Soccer Club! 2<br />Let's Make Japanese Professional Baseball Team!<br />Let's Make More Japanese Professional Baseball Team!<br />Let's Make Professional Baseball Team And Play Ball!<br />Let's Play With Japanese Professional Baseball Team On Net!<br />Let's Play With Japanese Professional Baseball Team!<br />Lien: Owaranai Kimi no Uta<br />Looney Tunes: Space Race<br />Love Chu<br />Love Hina: Smile Again<br />Love Hina: Totsuzen no Engeji Happening<br />Ma-Gi: Marginal<br />Mabaroshi Tsukiyo<br />Macross M3<br />MagForce Racing<br />Magic: The Gathering<br />Mahjong Taikai II Special<br />Majo no Ochakai<br />Maken X<br />Maqiupai<br />Marionette Company<br />Marionette Company 2<br />Marionette Handler<br />Marionette Handler 2<br />Mars Matrix<br />Marvel vs. Capcom: Clash of Super Heroes<br />Marvel vs. Capcom 2: New Age of Heroes<br />Mat Hoffman's Pro BMX<br />Max Steel<br />Maximum Pool<br />MDK 2<br />Mei*Puru<br />Memories Off 2nd<br />Memories Off Complete<br />Mercurius Pretty: end of the century<br />Metal Wolf<br />Metropolis Street Racer<br />Midway's Greatest Arcade Hits Volume 1<br />Midway's Greatest Arcade Hits Volume 2<br />Milky Season<br />Millennium Soldier: Expendable<br />Miss Moonlight<br />Missing Parts: The Tantei Stories<br />Missing Parts: The Tantei Stories Vol. 2<br />Missing Parts: The Tantei Stories Vol. 3<br />Mizuiro<br />Moekko Compagny<br />MoHo<br />Monaco Grand Prix<br />Monster Breed<br />Morita no Saikyou Reversi<br />Morita no Saikyou Shogi<br />Mortal Kombat Gold<br />Mr. Driller<br />Ms. Pac-Man Maze Madness<br />MTV Sports: Skateboarding<br />Musapey no Choco Marker<br />My Merry May<br />My Merry Maybe<br />Nadesico the Mission<br />Nakoruru: Ano Hito Kara No Okurimono<br />Namco Museum<br />Nanatsu no Hikan: Senritsu no Bishou<br />Napple Tale: Arsia in Daydream<br />NBA 2K<br />NBA 2K1<br />NBA 2K2<br />NBA Hoopz<br />NBA Showtime: NBA on NBC<br />NCAA College Football 2K2<br />Neo Golden Logres<br />Shinseiki Evangelion: Ayanami Ikusei Keikaku<br />Shinseiki Evangelion: Typing-E Keikaku<br />Shinseiki Evangelion: Typing Hokan Keikaku<br />Neppachi<br />Neppachi II @Vpachi CR Harenchi Gauken<br />Neppachi III @Vpachi CR do Konjou Gale 2 &amp; H<br />Neppachi IV @Vpachi CR Ah! Hananoouendan 3<br />Neppachi V @Vpachi CR Monster House<br />Neppachi VI @Vpachi CR Otakaratankentai<br />Net Versus Chess<br />Net Versus Hanafuda<br />Net Versus Igo<br />Net Versus Mahjong<br />Net Versus Renju Gomoku Namebe<br />Net Versus Reversi<br />Net Versus Shogi<br />Netto de Para<br />Netto de Tennis<br />Nettou de Golf<br />Never7: the end of infinity<br />The Next Tetris: Online Edition<br />NFL 2K<br />NFL 2K1<br />NFL 2K2<br />NFL Blitz 2000<br />NFL Blitz 2001<br />NFL QB Club 2001<br />NFL Quarterback Club 2000<br />NHL 2K<br />NHL 2K2<br />Nightmare Creatures II<br />Nijyuei<br />Nippon Pro Mahjong Renmei Kounin: Tetsuman Menkyo Minnaten<br />Nishikaze No Kyoushikyouku<br />Nobunaga no Yabou: Reppuden<br />Nobunaga no Yabou: Shouseiroku with Power-Up Kit<br />O.to.i.Re: Dreamcast Sequencer<br />Ogami Ichirou Funtouki<br />Omikron: The Nomad Soul<br />Omoide Ni Kawaru Kimi: Memories Off<br />Ooga Booga<br />Orange Pocket: Cornet<br />Oukahoushin: Hisashi Hana Saki Kishi Koku<br />Outtrigger<br />Pachi-Slo Teiou Dream Slot: Heiwa SP<br />Pachi-Slo Teiou Dream Slot: Olympia SP<br />Pachinko no Dendo CR Nanacy<br />Panzer Front<br />Patissier Nyanko Atsukoi wa ichigo Aji<br />Pen Pen TriIcelon<br />Phantasy Star Online<br />Phantasy Star Online Ver. 2<br />Pia Carrot e Youkoso! 2<br />Pia Carrot e Youkoso! 2.5<br />Pia Carrot e Youkoso! 3<br />Pizzicato Polka: Suisei Genya<br />Planet Ring<br />Plasma Sword<br />Plus Plum<br />Pocke Kano Yumi Shizyka Fumio<br />POD 2<br />Pop'n Music<br />Pop'n Music 2<br />Pop'n Music 3 Append Disc<br />Pop'n Music 4 Append Disc<br />Power Jet Racing 2001<br />Power Stone<br />Power Stone 2<br />Prince of Persia: Arabian Nights<br />Princess Holiday<br />Princess Maker Collection<br />Prism Heart<br />Prismaticallization<br />Pro Mahjong Kiwame D<br />Pro Pinball Trilogy<br />Projet Justice: Rival Schools 2<br />Psychic Force 2012<br />The Psychological Game<br />Psyvariar 2: The Will To Fabricate<br />Puyo Puyo 4<br />Puyo Puyo DA! Feat. ELLENA System<br />Puyo Puyo Fever<br />Q*Bert<br />Quake III Arena<br />Quiz Ah! My Goddess<br />Radilgy<br />Railroad Tycoon II<br />Rainbow Cotton<br />Rayman 2: The Great Escape<br />Re-Volt<br />Ready 2 Rumble Boxing<br />Ready 2 Rumble Boxing: Round 2<br />Real Sound 2: Kaze no Regret<br />FISH EYES | Wild<br />Record of Lodoss War<br />Red Dog<br />Rent A Hero No.1<br />Resident Evil 2<br />Resident Evil 3 Nemesis<br />Resident Evil Code: Veronica<br />Retro #8 Demo CD<br />Revive<br />Rez<br />Ring Age<br />The Ring: Terror's Realm<br />Roadsters<br />Roommania #203<br />Roommate Asami: Director's Edition<br />Roommate Novel: Ryoko Innoue<br />Roommate Novel: Ryoko Innoue: Last Scene<br />Roommate Novel: Yuka Sato<br />Run=Dim As Black Soul<br />Rune Caster<br />Rune Jade<br />Rush Rush Rally Racing<br />Sakura Momoko Gekijou: Coji Coji<br />Sakura Taisen<br />Sakura Taisen 2<br />Sakura Taisen 3: Is Paris Burning?<br />Sakura Taisen 4: Maidens Fall in Love<br />Sakura Taisen Complete Box<br />Sakura Taisen Kinematron Hanagumi Mail<br />Sakura Taisen Online: Paris No Nagai Hibi<br />Sakura Taisen Online: Teito No Nagai Hibi<br />Samba de Amigo<br />Samba de Amigo Ver.2000<br />San Francisco Rush 2049<br />Sangokushi VI<br />Seaman<br />Seaman: Kindan no Pet 2001<br />Sega Bass Fishing<br />Sega Bass Fishing 2<br />Sega GT<br />Sega Marine Fishing<br />Sega Rally 2<br />Sega Smash Pack Volume 1<br />Sega Swirl<br />Sega Tetris<br />Sega Worldwide Soccer 2000<br />Sega Worldwide Soccer 2000: Euro Edition<br />Segagaga<br />Seireiki Rayblade<br />Sengoku Turb<br />Sengoku Turb: Fanfan I love me Dunce-doubletendre<br />Sentimental Graffiti 2<br />Sentimental Graffiti: Yakusoku<br />Sentimental Prelude<br />Seventh Cross<br />Shadow Man<br />Shanghai Dynasty<br />Shenmue<br />Shenmue II<br />Shikigami no Shiro II<br />Shin Honkaku Hanafuda<br />Shin Nihon Pro Wrestling Toukon Retsuden 4<br />Shirotsume Kusa Hanashi: Episode of the Clovers<br />Shokora: Maid Cafe Curio<br />Silent Scope<br />Silver<br />Simple 2000 Series DC Vol.01: Bitter Sweet Fools: The Renai Adventure<br />Simple 2000 Series DC Vol.02: Natsuiro Celebration: The Renai Simulation<br />Simple 2000 Series DC Vol.03: Fureai: The Renai Simulation<br />Simple 2000 Series DC Vol.04: Okaeri! The Renai Adventure<br />Sister Princess Premium Edition<br />Skies of Arcadia<br />Slave Zero<br />Snappers-Nine Chairs<br />Snow<br />Sno-Cross Championship Racing<br />Snow Surfers<br />Soldier of Fortune<br />Sonic Adventure<br />Sonic Adventure 2<br />Sonic Shuffle<br />Sorcerian: Shichisei Mahou no Shito<br />Soul Calibur<br />Soul Fighter<br />South Park: Chef's Luv Shack<br />South Park Rally<br />Space Channel 5<br />Space Channel 5 Part 2<br />Spawn: In the Demon's Hand<br />Spec Ops II: Omega Squad<br />Speed Devils<br />Speed Devils Online Racing<br />Spider-Man<br />Spirit of Speed 1937<br />Sports Jam<br />Star Lancer<br />Star Wars: Demolition<br />Star Wars Episode One: Jedi Power Battles<br />Star Wars Episode One: Racer<br />Street Fighter Alpha 3<br />Street Fighter III: 3rd Strike<br />Street Fighter III: Double Impact<br />Striker Pro 2000<br />Stunt GP<br />Stupid Invaders<br />Suigetsu Mayoi-Gokoro<br />Suika<br />Suki Wa Higashi Ni Hi Wa Nishi Ni: Operation Sanctuary<br />Sunrise Eiyuutan<br />Super Hero Retsuden<br />Super Magnetic Neo<br />Super Producers: Mezase Show Biz Kai<br />Super Puzzle Fighter II X for Matching Service<br />Super Robot Taisen Alpha for Dreamcast<br />Super Runabout<br />Super Street Fighter II X For Matching Service<br />Surf Rocket Racers<br />Suzuki Alstare Extreme Racing<br />Sweet Season<br />Sword of the Berserk: Guts' Rage<br />Sydney 2000<br />Taisen Net Gimmick: Capcom &amp; Psikyo All Stars<br />Tako No Marine<br />Tamakyuu<br />Tanaka Torahiko No Urutoraryu Shogi<br />Tanteishinshi Dash !<br />Taxi 2: Le Jeu<br />Tech Romancer<br />Tee Off<br />Tenohira Wo Taiyouni<br />Tentama: 1st sunny side<br />Test Drive 6<br />Tetris 4D<br />Time Stalkers<br />Tokyo Bus Guide<br />Tokyo Highway Challenge<br />Tokyo Highway Challenge 2<br />Tom Clancy's Rainbow Six<br />Tom Clancy's Rainbow Six: Rogue Spear<br />Tomb Raider: The Last Revelation<br />Tomb Raider: Chronicles<br />Tony Hawk's Pro Skater<br />Toy Commander<br />Toy Racer<br />Toy Story 2<br />Treasure Strike<br />Trickstyle<br />Tricolor Crise<br />Trigger Heart Exelica<br />Trizeal<br />Twinkle Star Sprites<br />Typing of the Date<br />The Typing of the Dead<br />UEFA Dream Soccer<br />Ultimate Fighting Championship<br />Under Defeat<br />UnderCover AD2025 Kei<br />Unreal Tournament<br />Urban Chaos<br />Utau: Tumbling Dice<br />V-Rally 2: Expert Edition<br />Vampire Chronicle for Matching Service<br />Vanishing Point<br />Vermilion Desert<br />Vigilante 8: Second Battle<br />Virtua Athlete 2000<br />Virtua Cop 2<br />Virtua Fighter 3tb<br />Virtua Striker 2 Ver. 2000.1<br />Virtua Tennis<br />Virtua Tennis 2<br />Wacky Races<br />Walt Disney World Quest: Magical Racing Tour<br />Weakness Hero Torauman DC<br />Web Mystery: Yochimu Wo Miru Neko<br />Wetrix Plus<br />What's Shenmue?<br />Who Wants to Be a Millionaire?<br />Who Wants to Beat Up a Millionaire<br />Wild Metal<br />Wind: A Breath of Heart<br />Wind and Water: Puzzle Battles<br />Winning Post 4 Program 2000<br />World Neverland 2 Plus: The Waktic Republic of Pluto<br />World Neverland Plus: The Olerud Kingdom Stories<br />World Series Baseball 2K1<br />World Series Baseball 2K2<br />Worms Armageddon<br />Worms World Party<br />WWF Attitude<br />WWF Royal Rumble<br />Yoshia No Saka De Nekoronde<br />Yu Suzuki GameWorks Vol.1<br />Yukawa Motosenmu no Otakara Sagashi<br />Yuki-Gatari<br />Yume No Tsubasa: Fate of Heart<br />Yume Uma Ken '99 Internet<br />Yuukyuu Gensoukyoku 3: Perpetual Blue<br />Zero Gunner 2<br />Zombie Revenge<br />Zusar Vasar";

$games = explode('<br />', $list);

$gameList = array();
foreach($games as $game)
{
    $gameList[] = array('name' => $game, 'id_consoles' => 4, 'created_at' => '2014-05-30 00:00:00', 'updated_at' => '2014-05-30 00:00:00');
}

$db      = DB::table('cormus_games');
$return  = $db->insert($gameList);

die();
});
*/

//pega a id do usuário que esta logado
$user = Sentry::getUser();

//ajax do sistema para quando existem relação entro os campos select
Route::post('/ajax/relationship', function()
{
    $id      = Input::get('id');
    $id_camp = Input::get('id_camp');
    $table   = Input::get('table');
    $camp    = Input::get('camp');
    return DB::table($table)->where($id_camp, '=', $id)->select('id', $camp)->get();
});

//ajax do aplicativo para quando um usuário segue outro
Route::any('/ajax/follower', function()
{
    //pega a id do usuário que esta logado
    $user = Sentry::getUser();
    if($user)
    {
        //id o usuário que vai ser seguido
        $id = Input::get('id');
        $rows = DB::table('cormus_followers')->where('id_follower', '=', $user->id)->where('id_following', '=', $id)->select('id')->get();
        //se não esta seguindo segue, se esta para de seguir
        if(empty($rows))
        {
            DB::table('cormus_followers')->insert(array('id_follower' => $user->id, 'id_following' => $id));
            return 1;
        }
        else
        {
            DB::table('cormus_followers')->where('id_follower', '=', $user->id)->where('id_following', '=', $id)->delete();
            return 2;
        }
        
        return 0;
    }
    
    //realize login
    return -1;
});

//ajax para pegar os dados do produto que terá o modal aberto
Route::any('/ajax/profilemodalitem', function()
{
    //id o usuário que vai ser seguido
    $id   = Input::get('id');
    $item = DB::table('cormus_itens')->select('id', 'img_link', 'id_consoles', 'id_games', 'id_condition', 'disponivel', 'title', 'current_value', 'description')->where('id', '=', $id)->first();
    
    $patch = '';
    if(isset($item->id_consoles) && $item->id_consoles)
    {
        $console = DB::table('cormus_consoles')->where('id', '=', $item->id_consoles)->first();
        $console = array
        (
            'id'       => $console->id,
            'img_link' => $console->img_link,
            'name'     => $console->name,
            'history'  => $console->history
        );
		
        $path = 'data/consoles_user/';
    }
    else
    {
        $console = null;
    }
    
    if(isset($item->id_games) && $item->id_games)
    {
        $game = DB::table('cormus_games')->where('id', '=', $item->id_games)->first();
        $game = array
        (
            'id'                => $game->id,
            'img_link'          => $game->img_link,
            'genero'            => GameController::genero($game->id_genero),
            'region'            => GameController::region($game->id_region),
            'id_games_producer' => $game->id_games_producer,
            'name'              => $game->name,
            'history'           => $game->history 
        );
		
		$path = 'data/games_user/';
    }
    else
    {
        $game = null;
    }
    
    
    //realiza o tratamento dos comentários
    $comments_count =  DB::table('cormus_comments')
                        ->where('id_item', '=', $item->id)
                        ->orderBy('id', 'desc')
                        ->count();
    $commentsList =  DB::table('cormus_comments')
                        ->join('users', 'cormus_comments.id_user', '=', 'users.id')
                        ->select('cormus_comments.id', 'cormus_comments.comment', 'users.name', 'users.img_user', 'users.profile_name')
                        ->where('cormus_comments.id_item', '=', $item->id)
                        ->orderBy('cormus_comments.id', 'desc')
                        ->take(5)
                        ->get();
    for($i = 0; $i < count($commentsList); $i++)
    {
        $commentsList[$i]->img_user = json_decode($commentsList[$i]->img_user);
    }
    
    $likes_count = DB::table('cormus_likes')
                    ->where('id_item', '=', $item->id)
                    ->count();
    $likesList = DB::table('cormus_likes')
                    ->select('users.id', 'users.name', 'users.profile_name')
                    ->join('users', 'cormus_likes.id_user', '=', 'users.id')
                    ->where('cormus_likes.id_item', '=', $item->id)
                    ->orderBy('cormus_likes.id', 'desc')
                    ->take(5)
                    ->get();
    
    return array
    (
        'id'            => $item->id,
        'img_path'	=> $path,
        'img_link'      => $item->img_link,
        'condition'     => GameController::condition($item->id_condition),
        'disponivel'    => $item->disponivel,
        'title'         => $item->title,
        'current_value' => $item->current_value,
        'description'   => $item->description,
        'console'       => $console,
        'game'          => $game,
        'comments'      => array('comments_count' => $comments_count, 'list' => $commentsList),
        'likes'         => array('likes_count' => $likes_count, 'list' => $likesList),
    );
});



//ajax para realizar o comentário de um produto
Route::any('/ajax/itemcomment', function()
{
	//pega a id do usuário que esta logado
    $user = Sentry::getUser();
    if($user)
    {
        $data = array(
                'id_user'      => $user->id,
                'id_item'      => Input::get('id'),
                'comment'      => Input::get('comment')
        );
        $id_comment = DB::table('cormus_comments')->insertGetId($data);
        
        if($id_comment)
        {
            $imgs = json_decode($user->img_user);
            return array
            (
                'comment' => array('id' =>$id_comment, 'text' => Input::get('comment')),
                'user'    => array('id' =>$user->id, 'profile_name' => $user->profile_name, 'img' => $imgs[0], 'name' => $user->name),
                'message' => array('code' => '0', 'text' => 'Dados cadastrados com sucesso.')
            );
        }
        else
        {
            return array('message' => array('code' => '2', 'text' => 'Erro ao tentar cadastrar os dados, tente novamente.'));
        }
    }
    else
    {
            return array('message' => array('code' => '1', 'text' => 'É necessário realizar login no sistema'));
    }
});


$myApp = new XApp();
$myApp->setTitle('Game coleção');

$page  = new XPage();
    $page->setShowInMenu(false);
    $page->setRout('/login/{action?}');
    $page->setTitle('login');
    $homeController = new AuthController();
    $page->addModule('center', $homeController);
$myApp->addPage($page);


$page  = new XPage();
    $page->setRout('line');
    $page->setTitle('Line');
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(true);
    $lineController = new LineController();
    $page->addModule('center', $lineController->render());
$myApp->addPage($page);

$page  = new XPage();
    $page->setRout('/');
    $page->setTitle('Home');
    //$page->setLoginRequired(true);
    //$page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $homeController = new HomeController();
    $page->addModule('center', $homeController->render());
$myApp->addPage($page);


$page  = new XPage();
    $page->setRout('404');
    $page->setTitle('404');
    //$page->setLoginRequired(true);
    //$page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $homeController = new HomeController();
    $page->addModule('center', $homeController->render());
$myApp->addPage($page);

//sN1bzdCRVOi632OA64ba42929165ba8b321d7ec1187e8467d9e63fb1872cca9cb16d1569db3dda44
$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('count');
    $page->setTitle('Conta');
        $form = new XForm();
        $form->setTable('users');
        $form->setTitle('Conta');
        //seta a id do usuário que esta logado diretamente no formulário
        if($user)
            $form->setId($user->id);
            //$form->setId(50);
        
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_top');
            $field->setTitle('Imagem para o topo do seu perfil');
            $field->setPath('data/top');
            $field->setRequired(false);
            $form->addField($field);
                    
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_user');
            $field->setTitle('Imagem para o seu perfil');
            $field->setPath('data/user');
            $field->setRequired(false);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('email');
            $field->setTitle('Email');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('profile_name');
            $field->setTitle('Nome de usuário');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('password');
            $field->setName('password');
            $field->setTitle('Senha');
            $field->setRequired(false);
            $form->addField($field);
            
    $page->addModule('center', $form);       
$myApp->addPage($page);

$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('games-producer');
    $page->setTitle('Produtora de jogos');
        $form = new XForm();
        $form->setTable('cormus_games_producer');
        $form->setTitle('Produtora de jogos');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/game_producer');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $form->addField($field);

            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('history');
            $field->setTitle('História');
            $form->addField($field);

            //coloca o campo de data
            $field = $form->field('date');
            $field->setName('foundation_date');
            $field->setTitle('Data de fundação');
            $form->addField($field);
    $page->addModule('center', $form);       
$myApp->addPage($page);

$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('consoles-producer');
    $page->setTitle('Fabricante de consoles');
        $form = new XForm();
        $form->setTable('cormus_consoles_producer');
        $form->setTitle('Fabricante de consoles');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/console_producer');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $form->addField($field);

            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('history');
            $field->setTitle('História');
            $form->addField($field);

            //coloca o campo de data
            $field = $form->field('date');
            $field->setName('foundation_date');
            $field->setTitle('Data de fundação');
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);



$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('consoles');
    $page->setTitle('Consoles');
        $form = new XForm();
        $form->setTable('cormus_consoles');
        $form->setTitle('Consoles');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/console');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('cormus_consoles_producer');
            $field->setName('id_consoles_producer');
            $field->setTitle('Console');
            $field->setFilter(true);
            //$field->setValue(3);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $form->addField($field);

            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('history');
            $field->setTitle('História');
            $form->addField($field);

            //coloca o campo de data
            $field = $form->field('date');
            $field->setName('release_date');
            $field->setTitle('Data de lançamento');
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);


$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('games');
    $page->setTitle('Todos jogos');
        $form = new XForm();
        $form->setTable('cormus_games');
        $form->setTitle('Jogos');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/console');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('name');
            $field->setTitle('Nome');
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('cormus_games_producer');
            $field->setName('id_games_producer');
            $field->setTitle('Produtora');
            $field->setFilter(true);
            //$field->setValue(3);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->setName('id_region');
            $field->setTitle('Região');
            $field->setFilter(true);
            //$field->setValue(3);
            $field->setOptions(GameController::regions());
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->setName('id_genero');
            $field->setTitle('Genero');
            $field->setFilter(true);
            //$field->setValue(3);
            $field->setOptions(GameController::generos());
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('cormus_consoles');
            $field->setName('id_consoles');
            $field->setTitle('Console');
            $field->setFilter(true);
            //$field->setValue(3);
            $form->addField($field);

            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('history');
            $field->setTitle('História');
            $form->addField($field);

            //coloca o campo de data
            $field = $form->field('date');
            $field->setName('release_date');
            $field->setTitle('Data de lançamento');
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);


$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    //$page->setShowInMenu(false);
    $page->setRout('games_user');
    $page->setTitle('Meus jogos');
        $form = new XForm();
		$form->addExtraWhere('id_games', '<>', 0);
        $form->setTable('cormus_itens');
        $form->setTitle('Meus jogos');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/games_user');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('id_user');
            $field->setTitle('ID user');
            $field->setValue(50);
            $field->setShowList(false);
            $field->setShowForm(false);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            //$field->setMask('99-99-9999');
            $field->setName('title');
            $field->setTitle('Título');
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('checkbox');
            $field->setName('disponivel');
            $field->setTitle('Disponível para');
            $field->setFilter(true);
            $field->setOptions(array(
                1 => 'Venda',
                2 => 'Troca'
            ));
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('cormus_consoles');
            $field->setName('id_consoles');
            $field->setTitle('Console');
            $field->setRequired(true);
            $field->setFilter(true);
            //quando um campo depende do valor escolhido por outro, os dados do outro campo são carregados via AJAX assim que esse é selecionado
            $field->relationship('cormus_games', 'id_consoles', 'name', 'id_games');
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->setTitle('Jogo');
            $field->setName('id_games');
            $field->setTable('cormus_games');
            $field->selectOptions('id', 'name');
            //não preenche automaticamente quando o form é aberto
            $field->setLoadList(false);
            $field->setRequired(true);
            $field->setOptions(array(
                0 => 'Escolha um console primeiro'
            ));
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->setName('id_condition');
            $field->setTitle('Condição');
            $field->setRequired(true);
            $field->setFilter(true);
            $field->setOptions(GameController::conditions());
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setShowList(false);
            $field->setName('purchase_value');
            $field->setTitle('Valor de compra (R$)');
            $field->setMask('money');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setShowList(false);
            $field->setName('current_value');
            $field->setTitle('Valor atual (R$)');
            $field->setMask('money');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('description');
            $field->setTitle('Descrição');
            $form->addField($field);
            
            //coloca o campo de data
            $field = $form->field('date');
            $field->setShowList(false);
            $field->setName('aquisicao_date');
            $field->setTitle('Data da aquisição');
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);



$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    //$page->setShowInMenu(false);
    $page->setRout('consoles_user');
    $page->setTitle('Meus consoles');
        $form = new XForm();
		$form->addExtraWhere('id_games', '=', 0);
        $form->setTable('cormus_itens');
        $form->setTitle('Meus consoles');
            //coloca o compo da imagem
            $field = $form->field('image');
            $field->setName('img_link');
            $field->setTitle('Imagem');
            $field->setPath('data/consoles_user');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setName('id_user');
            $field->setTitle('ID user');
            $field->setValue(50);
            $field->setShowList(false);
            $field->setShowForm(false);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            //$field->setMask('99-99-9999');
            $field->setName('title');
            $field->setTitle('Título');
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('checkbox');
            $field->setName('disponivel');
            $field->setTitle('Disponível para');
            $field->setFilter(true);
            $field->setOptions(array(
                1 => 'Venda',
                2 => 'Troca'
            ));
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('cormus_consoles');
            $field->setName('id_consoles');
            $field->setTitle('Console');
            $field->setRequired(true);
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->setName('id_condition');
            $field->setTitle('Condição');
            $field->setRequired(true);
            $field->setFilter(true);
            $field->setOptions(array(
                1 => 'Novo',
                2 => 'Usado',
                3 => 'Lacrado',
                4 => 'Velho',
                5 => 'Exelente estado'
            ));
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setShowList(false);
            $field->setName('purchase_value');
            $field->setTitle('Valor de compra (R$)');
            $field->setMask('money');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('text');
            $field->setShowList(false);
            $field->setName('current_value');
            $field->setTitle('Valor atual (R$)');
            $field->setMask('money');
            $field->setRequired(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setShowList(false);
            $field->setName('description');
            $field->setTitle('Descrição');
            $form->addField($field);
            
            //coloca o campo de data
            $field = $form->field('date');
            $field->setShowList(false);
            $field->setName('aquisicao_date');
            $field->setTitle('Data da aquisição');
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);



//--------Páginas do sistema-------//


$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setRout('sistem_followers');
    $page->setShowInMenu(false);
    $page->setTitle('Followers');
        $form = new XForm();
        $form->setTable('cormus_followers');
        $form->setTitle('Followers');
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('users');
            $field->setName('id_follower');
            $field->setTitle('Seguidor');
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('users');
            $field->setName('id_following');
            $field->setTitle('Seguido');
            $field->setFilter(true);
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);



$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $page->setRout('sistem_comments');
    $page->setTitle('Comentários');
        $form = new XForm();
        $form->setTable('cormus_comments');
        $form->setTitle('Comentário');
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('users');
            $field->setName('id_user');
            $field->setTitle('Usuário');
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'title');
            $field->setTable('cormus_itens');
            $field->setName('id_item');
            $field->setTitle('Item');
            $field->setRequired(true);
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de texto
            $field = $form->field('textarea');
            $field->setName('comment');
            $field->setTitle('Comentário');
            $field->setRequired(true);
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);



$page  = new XPage();
    $page->setLoginRequired(true);
    $page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $page->setRout('sistem_likes');
    $page->setTitle('Curtidas');
        $form = new XForm();
        $form->setTable('cormus_likes');
        $form->setTitle('Curtidas');
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'name');
            $field->setTable('users');
            $field->setName('id_user');
            $field->setTitle('Usuário');
            $field->setFilter(true);
            $form->addField($field);
            
            //coloca o campo de select
            $field = $form->field('select');
            $field->selectOptions('id', 'title');
            $field->setTable('cormus_itens');
            $field->setName('id_item');
            $field->setTitle('Item');
            $field->setRequired(false);
            $field->setFilter(true);
            $form->addField($field);
    $page->addModule('center', $form); 
$myApp->addPage($page);

//----------Página de perfil do usuário---------//

$page  = new XPage();
    $page->setRout('/{user}');
    $page->setTitle('Profile');
    $page->setLoginRequired(false);
    //$page->setShowInMenuIfLogged(true);
    $page->setShowInMenu(false);
    $profileController = new ProfileController();
    $page->addModule('center', $profileController);
$myApp->addPage($page);

//--------configuração padrão para todas páginas------------//

$myApp->setMenuStructure(array(
    '/',
    array
    (
        'title'  => 'Games',
        'routes' => array
        (
            'games-producer',
            'games',
            'games_my',
        ),
    ),
    array
    (
        'title'  => 'Consoles',
        'routes' => array
        (
            'consoles-producer',
            'consoles',
        )
    )
));

//coloca os módulos padrão a todas as páginas
$headerController = new  HeaderController();
$FooterController = new  FooterController();
$MenuController   = new  MenuController();
$myApp->addDefullModules(array(
    'header' => $headerController->render(),
    'footer' => $FooterController->render(),
    //'menu'   => $MenuController->render(array('projectName' => $myApp->getTitle(), 'pages' => $myApp->menuStructure())),
    'menu'   => $MenuController->render(array('projectName' => $myApp->getTitle(), 'pages' => $myApp->getPages()))
));


//executa o aplicativo
$myApp->run();