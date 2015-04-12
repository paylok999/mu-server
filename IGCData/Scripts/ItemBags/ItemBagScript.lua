-- // ============================================================
-- // == INTERNATIONAL GAMING CENTER NETWORK
-- // == www.igc-network.com
-- // == (C) 2010-2014 IGC-Network (R)
-- // ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
-- // == Modify if you know what you do only!
-- // == File is a part of IGCN Group MuOnline Server files.
-- // ============================================================

-- ItemBag Control Script, Lua v5.2
-- Can be modified to adjust ItemBags behaviour for own needs

-- Any Custom chances to the script are out of support scope
-- It is fully reloadable without need to shut down server

-- Define Bag Types
	BAG_COMMON = 0 -- Mostly Boxes and other items which dropped on ground throws item
	BAG_MONSTER = 1 -- Basically all Monsters, apart of those which have their dedicated drop system
	BAG_EVENT = 2 -- Hard-coded, no new items can be added to this section

-- BAG_EVENT::EventID
	EVENTBAG_ARCA = 0
	EVENTBAG_NEWPVP = 1
	EVENTBAG_ITLOW = 2
	EVENTBAG_ITMED = 3
	EVENTBAG_ITHIGH = 4
	EVENTBAG_IT = 5
	EVENTBAG_BC1 = 6
	EVENTBAG_BC2 = 7
	EVENTBAG_BC3 = 8
	EVENTBAG_BC4 = 9
	EVENTBAG_BC5 = 10
	EVENTBAG_BC6 = 11
	EVENTBAG_BC7 = 12
	EVENTBAG_BC8 = 13
	EVENTBAG_CC = 14
	EVENTBAG_LMS = 15
	EVENTBAG_SANTAFIRST = 16
	EVENTBAG_SANTASECOND = 17
	EVENTBAG_SANTATHIRD = 18
	EVENTBAG_WARRIORRING_1 = 19
	EVENTBAG_WARRIORRING_2 = 20
	EVENTBAG_CHERRYBLOSSOM = 21
	EVENTBAG_LUCKYCOIN10 = 22
	EVENTBAG_LUCKYCOIN20 = 23
	EVENTBAG_LUCKYCOIN30 = 24
	EVENTBAG_LORDMIX = 25
	EVENTBAG_KUNDUN = 26


-- Calculate ItemID Mask
function MakeItemID(ItemType, ItemIndex)
	return ItemType * 512 + ItemIndex;
end

function LoadItemBag() -- Bags Load

-- ====================================================================
-- ItemBags -- BagType, MakeItemID(Type,Index), ItemLevel, 'FileName'
-- ====================================================================

	AddItemBag(BAG_COMMON, MakeItemID(12,32), 0, 'Item_(12,32,0)_Red_Ribbon_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(12,33), 0, 'Item_(12,33,0)_Green_Ribbon_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(12,34), 0, 'Item_(12,34,0)_Blue_Ribbon_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 0, 'Item_(14,11,0)_Luck_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 1, 'Item_(14,11,1)_Sacred_Birth_Star') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 2, 'Item_(14,11,2)_Firecracker') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 3, 'Item_(14,11,3)_Love_Heart') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 5, 'Item_(14,11,5)_Silver_Medal') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 6, 'Item_(14,11,6)_Gold_Medal') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 7, 'Item_(14,11,7)_Heaven_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 8, 'Item_(14,11,8)_Kundun_Box+1') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 9, 'Item_(14,11,9)_Kundun_Box+2') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 10,'Item_(14,11,10)_Kundun_Box+3') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 11,'Item_(14,11,11)_Kundun_Box+4') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,11), 12,'Item_(14,11,12)_Kundun_Box+5') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,32), 0, 'Item_(14,32,0)_Pink_Chocolate_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,32), 1, 'Item_(14,32,1)_Light_Purple_Candy_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,33), 0, 'Item_(14,33,0)_Red_Chocolate_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,33), 1, 'Item_(14,33,1)_Orange_Candy_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,34), 0, 'Item_(14,34,0)_Blue_Chocolate_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,34), 1, 'Item_(14,34,1)_Dark_Blue_Candy_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,45), 0, 'Item_(14,45,0)_Pumpkin_of_Luck') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,52), 0, 'Item_(14,52,0)_GM_Gift_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,55), 0, 'Item_(14,55,0)_Green_Chaos_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,56), 0, 'Item_(14,56,0)_Red_Chaos_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,57), 0, 'Item_(14,57,0)_Purple_Chaos_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,84), 0, 'Item_(14,84,0)_Cherry_Blossom_Play_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,123),0, 'Item_(14,123,0)_Golden_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,124),0, 'Item_(14,124,0)_Silver_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,157),0, 'Item_(14,157,0)_Green_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,158),0, 'Item_(14,158,0)_Red_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,159),0, 'Item_(14,159,0)_Purple_Box') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,141),0, 'Item_(14,141,0)_Shining_Jewelry_Case') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,142),0, 'Item_(14,142,0)_Elegant_Jewelry_Case') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,143),0, 'Item_(14,143,0)_Steel_Jewelry_Case') -- DropFunction /1/
	AddItemBag(BAG_COMMON, MakeItemID(14,144),0, 'Item_(14,144,0)_Old_Jewelry_Case') -- DropFunction /1/

-- ====================================================================
-- MonsterBags -- BagType, 0, MonsterID, 'FileName'
-- ====================================================================
	AddItemBag(BAG_MONSTER, 0, 44, 'Monster_(44)_Dragon_Red') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 55, 'Monster_(55)_Death_King') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 295,'Monster_(295)_Erohim') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 340,'Monster_(340)_Dark_Elf') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 349,'Monster_(349)_Balgass') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 361,'Monster_(361)_Nightmare') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 362,'Monster_(362)_Mayas_Left_Hand') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 363,'Monster_(363)_Mayas_Right_Hand') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 365,'Monster_(365)_Pouch_of_Blessing') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 413,'Monster_(413)_Lunar_Rabbit') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 414,'Monster_(414)_Helper_Ellen') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 459,'Monster_(459)_Selupan') -- DropFunction /2/
	AddItemBag(BAG_MONSTER, 0, 561,'Monster_(561)_Medusa') -- DropFunction /2/

-- ====================================================================
-- EventBags -- BagType, EventID, 0, 'FileName'
-- ====================================================================
	AddItemBag(BAG_EVENT, 0, 0, 'Buff_AkeronTower_Drop') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 1, 0, 'Buff_Gladiators_Drop') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 2, 0, 'Event_IllusionTemple(1-2)_Monsters') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 3, 0, 'Event_IllusionTemple(3-4)_Monsters') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 4, 0, 'Event_IllusionTemple(5-6)_Monsters') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 5, 0, 'Event_IllusionTemple_Reward') -- -- DropFunction /3/
	AddItemBag(BAG_EVENT, 6, 0, 'Event_BloodCastle(1)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 7, 0, 'Event_BloodCastle(2)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 8, 0, 'Event_BloodCastle(3)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 9, 0, 'Event_BloodCastle(4)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 10,0, 'Event_BloodCastle(5)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 11,0, 'Event_BloodCastle(6)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 12,0, 'Event_BloodCastle(7)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 13,0, 'Event_BloodCastle(8)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 14,0, 'Event_ChaosCastle_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 15,0, 'Event_LastManStanding_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 16,0, 'NPC_SantaClause(1)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 17,0, 'NPC_SantaClause(2)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 18,0, 'NPC_SantaClause(3)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 19,0, 'Item_WarriorRing(40)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 20,0, 'Item_WarriorRing(80)_Reward') -- DropFunction /3/
	AddItemBag(BAG_EVENT, 21,0, 'Mix_CherryBlossomGold_Reward') -- DropFunction /4/
	AddItemBag(BAG_EVENT, 22,0, 'Mix_LuckyCoin(10)_Reward') -- DropFunction /4/
	AddItemBag(BAG_EVENT, 23,0, 'Mix_LuckyCoin(20)_Reward') -- DropFunction /4/
	AddItemBag(BAG_EVENT, 24,0, 'Mix_LuckyCoin(30)_Reward') -- DropFunction /4/
	AddItemBag(BAG_EVENT, 25,0, 'Mix_Senior_Reward') -- DropFunction /4/
	AddItemBag(BAG_EVENT, 26,0, 'Monster_(275)_Kundun') -- DropFunction /3/
end

function MakeExcOptForLordMix()

	local OptionLoop = GetRandomValue(3) + 2
	local ExcOpt = 0

	while OptionLoop > 0 do
		local RandOp = GetRandomValue(6)
		local Option = bit32.lshift(1,RandOp)
		
		if bit32.band(ExcOpt, Option) ~= Option then
			bit32.bor(ExcOpt, Option)
			OptionLoop = OptionLoop - 1
		end
	end

	return ExcOpt
end

-- ### /1/ Drop Item (using Item Bag Structure) ### --

function CommonBagItemDrop(aIndex, MapNumber, X, Y)
	local ItemID = MakeItemID(ItemInfo.ItemType, ItemInfo.ItemIndex)
	local ItemCheck = IsItem(ItemID);
	
	if ItemCheck == false then
		LogAdd(string.format('Wrong Item In Bag (ItemID: %d)', ItemID))
		return 0
	end

	local ItemLevel = GetBagItemLevel(ItemInfo.ItemMinLevel, ItemInfo.ItemMaxLevel)
	local IsSkill = 0
	local IsLuck = 0
	local IsOption = 0
	local IsExc = 0
	local IsAncient = 0
	local IsSocket = 0
	local IsElemental = 0 -- Always 0 if running files as S6E3

		if (ItemInfo.Skill == 1) then -- Skill Always
			IsSkill = 1
		elseif (ItemInfo.Skill == -1) then -- Random, 50% chance for Skill
			IsSkill = GetRandomValue(2)
		else -- No Skill (protection against unsupported values)				
			IsSkill = 0
		end


		if (ItemInfo.Luck == 1) then -- Luck Always
			IsLuck = 1
		elseif (ItemInfo.Luck == -1) then -- Random, 50% chance for Luck
			IsLuck = GetRandomValue(2)
		else -- no Luck (protection against unsupported values)
			IsLuck = 0
		end


		if (ItemInfo.Option == -1) then -- Random Option
			if (GetRandomValue(3) >= 1) then -- 33% chance to get option, if greater than or equal 1 then
				IsOption = GetRandomValue(8) -- +0 up to +28
			end	
		elseif (ItemInfo.Option > 0 and ItemInfo.Option <= 7) then -- options +4 (1) to +28 (7)
			IsOption = ItemInfo.Option
		else -- no option
			IsOption = 0
		end


		if (ItemInfo.Exc > 0) then -- sets item with options of configured exc mask
			IsExc = ItemInfo.Exc
		elseif (ItemInfo.Exc == -1) then -- random exc option(s)
			IsExc = GetExcellentOpt()
		end


		if (ItemInfo.Anc == 1) then -- Says item is ancient (must be configured as possible ancient first)
			IsAncient = GetAncientOpt(ItemID)
		end


		-- Item must be of Type 3 in item list settings

		if (IsSocketItem(ItemID) == true) then
			if (ItemInfo.Socket > 0 and ItemInfo.Socket <= 5) then -- 0-5 socket holes
				IsSocket = GetRandomValue(ItemInfo.Socket)+1
			end
		else
			IsSocket = 0 -- no socket, applies for items of no item type 3 only
		end


		-- Always 0 for S6E3

		if (IsElementalItem(ItemID) == true) then
			if (ItemInfo.Elemental > 0 and ItemInfo.Elemental <= 5) then
				IsElemental = ItemInfo.Elemental -- Attributes selection
			elseif (ItemInfo.Elemental == -1) then -- random attribute
				IsElemental = GetRandomValue(6) -- 0-5
			end
		else
			IsElemental = 0 -- no elemental attributes, applies for non elemental items only
		end

		-- ### Elemental Items ###
		-- (12,144) -- Mithril Fragment
		-- (12,145) -- Mithril
		-- (12,148) -- Mithril Fragment Bunch
		-- (12,149) -- Elixir Fragment Bunch
		-- (12,200) -- Muren's Book of Magic
		-- (12,201) -- Scroll of Etramu
		-- (12,221) -- Errtel of Anger
		-- (12,231) -- Errtel of Blessing
		-- (12,241) -- Errtel of Integrity
		-- (12,251) -- Errtel of Divinity
		-- (12,261) -- Errtel of Gale


	-- Protection against specified items which should not come with extra options

	if ItemID == MakeItemID(12,15) -- Jewel of Chaos
	or ItemID == MakeItemID(14,13) -- Jewel of Bless
	or ItemID == MakeItemID(14,14) -- Jewel of Soul
	or ItemID == MakeItemID(14,16) -- Jewel of Life
	or ItemID == MakeItemID(14,22) -- Jewel of Creation
	then
		ItemLevel = 0
		IsSkill = 0
		IsLuck = 0
		IsOption = 0
		IsExc = 0
		IsAncient = 0
		IsSocket = 0
		IsElemental = 0
	end

	-- Protection against elemental setting value to unsupported items

	if (IsElementalItem(ItemID) == false) then -- if item not elemental then set elemental to 0
		IsElemental = 0
	elseif (IsElementalItem(ItemID) == true and IsElemental == 0) then -- if elemental item and no attribute set
		IsElemental = GetRandomValue(6) -- make a draw, 0-5
			if (IsElemental == 0) then -- if 0 then
				IsElemental = 1 -- set attribute 1
			end
	end
	
	if (ItemID == MakeItemID(12,200) or ItemID == MakeItemID(12,201) and IsSocket == 0) then
		IsSocket = GetRandomValue(6) -- empty slots 0-5
			if (IsSocket == 0) then
				IsSocket = 1
			end
	end
	
	-- If Errtel then hang execution of the script (Errtels cannot be dropped at present using ItemBags)
	
	if ItemID == MakeItemID(12,221) -- Errtel of Anger
	or ItemID == MakeItemID(12,231) -- Errtel of Blessing
	or ItemID == MakeItemID(12,241) -- Errtel of Integrity
	or ItemID == MakeItemID(12,251) -- Errtel of Divinity
	or ItemID == MakeItemID(12,261) -- Errtel of Gale
	then
		LogAdd(string.format('Errtel drop attempt from ItemBag. Drop not supported, item removed, ID: %d', ItemID))
		return
	end

	-- Protection against socket items configured with no sockets

	if (IsSocketItem(ItemID) == true and IsSocket == 0) then
		IsSocket = 1 -- set to one socket only
	end
	
	CreateItem(aIndex, MapNumber, X, Y, ItemID, ItemLevel, 0, IsSkill, IsLuck, IsOption, aIndex, IsExc, IsAncient, 0, IsSocket, IsElemental)
	return 1
end


-- ### /2/ Drop Item (using Monster Bag Structure) ### --

function MonsterBagItemDrop(MonsterIndex, MapNumber, MonsterX, MonsterY, PlayerIndex)
	local ItemID = MakeItemID(ItemInfo.ItemType, ItemInfo.ItemIndex)
	local ItemCheck = IsItem(ItemID);
	
	if ItemCheck == false then
		LogAdd(string.format('Wrong Item In Bag (ItemID: %d)', ItemID))
		return 0
	end

	local ItemLevel = GetBagItemLevel(ItemInfo.ItemMinLevel, ItemInfo.ItemMaxLevel)
	local IsSkill = 0
	local IsLuck = 0
	local IsOption = 0
	local IsExc = 0
	local IsAncient = 0
	local IsSocket = 0
	local IsElemental = 0	-- Always 0 if running files as S6E3

		if (ItemInfo.Skill == 1) then -- Skill Always
			IsSkill = 1
		elseif (ItemInfo.Skill == -1) then -- Random, 50% chance for Skill
			IsSkill = GetRandomValue(2)
		else -- No Skill (protection against unsupported values)				
			IsSkill = 0
		end


		if (ItemInfo.Luck == 1) then -- Luck Always
			IsLuck = 1
		elseif (ItemInfo.Luck == -1) then -- Random, 50% chance for Luck
			IsLuck = GetRandomValue(2)
		else -- no Luck (protection against unsupported values)
			IsLuck = 0
		end


		if (ItemInfo.Option == -1) then -- Random Option
			if (GetRandomValue(3) >= 1) then -- 33% chance to get option, if greater than or equal 1 then
				IsOption = GetRandomValue(8) -- +0 up to +28
			end	
		elseif (ItemInfo.Option > 0 and ItemInfo.Option <= 7) then -- options +4 (1) to +28 (7)
			IsOption = ItemInfo.Option
		else -- no option
			IsOption = 0
		end


		if (ItemInfo.Exc > 0) then -- sets item with options of configured exc mask
			IsExc = ItemInfo.Exc
		elseif (ItemInfo.Exc == -1) then -- random exc options
			IsExc = GetExcellentOpt()
		end


		if (ItemInfo.Anc == 1) then -- Says item must be ancient (must be configured as possible ancient)
			IsAncient = GetAncientOpt(ItemID)
		end


		-- Item must be of Type 3 is item list settings

		if (IsSocketItem(ItemID) == true) then
			if (ItemInfo.Socket > 0 and ItemInfo.Socket <= 5) then -- 0-5 socket holes
				IsSocket = GetRandomValue(ItemInfo.Socket)+1
			end
		else
			IsSocket = 0 -- no socket, applies for items of no item type 3 only
		end


		-- Always 0 for S6E3

		if (IsElementalItem(ItemID) == true) then
			if (ItemInfo.Elemental > 0 and ItemInfo.Elemental <= 5) then
				IsElemental = ItemInfo.Elemental -- Attributes selection
			elseif (ItemInfo.Elemental == -1) then -- random attribute
				IsElemental = GetRandomValue(6) -- 0-5
			end
		else
			IsElemental = 0 -- no elemental attributes, applies for non elemental items only
		end

		-- ### Elemental Items ###
		-- (12,144) -- Mithril Fragment
		-- (12,145) -- Mithril
		-- (12,148) -- Mithril Fragment Bunch
		-- (12,149) -- Elixir Fragment Bunch
		-- (12,200) -- Muren's Book of Magic
		-- (12,201) -- Scroll of Etramu
		-- (12,221) -- Errtel of Anger
		-- (12,231) -- Errtel of Blessing
		-- (12,241) -- Errtel of Integrity
		-- (12,251) -- Errtel of Divinity
		-- (12,261) -- Errtel of Gale

	-- Protection against specified items which should not come with extra options

	if ItemID == MakeItemID(12,15) -- Jewel of Chaos
	or ItemID == MakeItemID(14,13) -- Jewel of Bless
	or ItemID == MakeItemID(14,14) -- Jewel of Soul
	or ItemID == MakeItemID(14,16) -- Jewel of Life
	or ItemID == MakeItemID(14,22) -- Jewel of Creation
	then
		ItemLevel = 0
		IsSkill = 0
		IsLuck = 0
		IsOption = 0
		IsExc = 0
		IsAncient = 0
		IsSocket = 0
		IsElemental = 0
	end

	-- Protection against elemental setting value to unsupported items

	if (IsElementalItem(ItemID) == false) then -- if item not elemental then set elemental to 0
		IsElemental = 0
	elseif (IsElementalItem(ItemID) == true and IsElemental == 0) then -- if elemental item and no attribute set
		IsElemental = GetRandomValue(6) -- make a draw, 0-5
			if (IsElemental == 0) then -- if 0 then
				IsElemental = 1 -- set attribute 1
			end
	end
	
	if (ItemID == MakeItemID(12,200) or ItemID == MakeItemID(12,201) and IsSocket == 0) then
		IsSocket = GetRandomValue(6) -- empty slots 0-5
			if (IsSocket == 0) then
				IsSocket = 1
			end
	end
	
	-- If Errtel then hang execution of the script (Errtels cannot be dropped at present using ItemBags)
	
	if ItemID == MakeItemID(12,221) -- Errtel of Anger
	or ItemID == MakeItemID(12,231) -- Errtel of Blessing
	or ItemID == MakeItemID(12,241) -- Errtel of Integrity
	or ItemID == MakeItemID(12,251) -- Errtel of Divinity
	or ItemID == MakeItemID(12,261) -- Errtel of Gale
	then
		LogAdd(string.format('Errtel drop attempt from ItemBag. Drop not supported, item removed, ID: %d', ItemID))
		return
	end

	-- Protection against socket items configured with no sockets

	if (IsSocketItem(ItemID) == true and IsSocket == 0) then
		IsSocket = 1 -- set to one socket only
	end


	CreateItem(MonsterIndex, MapNumber, MonsterX, MonsterY, ItemID, ItemLevel, 0, IsSkill, IsLuck, IsOption, PlayerIndex, IsExc, IsAncient, 0, IsSocket, IsElemental)
	return 1
end


-- ### /3/ Create Item (using Event Bag Structure) - Item Drop on Ground ### --

function EventBagItemDrop(MonsterIndex, MapNumber, MonsterX, MonsterY, PlayerIndex)
	local ItemID = MakeItemID(ItemInfo.ItemType, ItemInfo.ItemIndex)
	local ItemCheck = IsItem(ItemID);

	if ItemCheck == false then
		LogAdd(string.format('Wrong Item In Bag (ItemID: %d)', ItemID))
		return 0
	end

	local ItemLevel = GetBagItemLevel(ItemInfo.ItemMinLevel, ItemInfo.ItemMaxLevel)
	local IsSkill = 0
	local IsLuck = 0
	local IsOption = 0
	local IsExc = 0
	local IsAncient = 0
	local IsSocket = 0
	local IsElemental = 0	-- Always 0 if running files as S6E3

		if (ItemInfo.Skill == 1) then -- Skill Always
			IsSkill = 1
		elseif (ItemInfo.Skill == -1) then -- Random, 50% chance for Skill
			IsSkill = GetRandomValue(2)
		else -- No Skill (protection against unsupported values)				
			IsSkill = 0
		end


		if (ItemInfo.Luck == 1) then -- Luck Always
			IsLuck = 1
		elseif (ItemInfo.Luck == -1) then -- Random, 50% chance for Luck
			IsLuck = GetRandomValue(2)
		else -- no Luck (protection against unsupported values)
			IsLuck = 0
		end


		if (ItemInfo.Option == -1) then -- Random Option
			if (GetRandomValue(3) >= 1) then -- 33% chance to get option, if greater than or equal 1 then
				IsOption = GetRandomValue(8) -- +0 up to +28
			end	
		elseif (ItemInfo.Option > 0 and ItemInfo.Option <= 7) then -- options +4 (1) to +28 (7)
			IsOption = ItemInfo.Option
		else -- no option
			IsOption = 0
		end


		if (ItemInfo.Exc > 0) then -- sets item with options of configured exc mask
			IsExc = ItemInfo.Exc
		elseif (ItemInfo.Exc == -1) then -- random exc options
			IsExc = GetExcellentOpt()
		end


		if (ItemInfo.Anc == 1) then -- Says item must be ancient (must be configured as possible ancient first)
			IsAncient = GetAncientOpt(ItemID)
		end


		-- Item must be of Type 3 is item list settings

		if (IsSocketItem(ItemID) == true) then
			if (ItemInfo.Socket > 0 and ItemInfo.Socket <= 5) then -- 0-5 socket holes
				IsSocket = GetRandomValue(ItemInfo.Socket)+1
			end
		else
			IsSocket = 0 -- no socket, applies for items of no item type 3 only
		end


		-- Always 0 for S6E3

		if (IsElementalItem(ItemID) == true) then
			if (ItemInfo.Elemental > 0 and ItemInfo.Elemental <= 5) then
				IsElemental = ItemInfo.Elemental -- Attributes selection
			elseif (ItemInfo.Elemental == -1) then -- random attribute
				IsElemental = GetRandomValue(6) -- 0-5
			end
		else
			IsElemental = 0 -- no elemental attributes, applies for non elemental items only
		end

		-- ### Elemental Items ###
		-- (12,144) -- Mithril Fragment
		-- (12,145) -- Mithril
		-- (12,148) -- Mithril Fragment Bunch
		-- (12,149) -- Elixir Fragment Bunch
		-- (12,200) -- Muren's Book of Magic
		-- (12,201) -- Scroll of Etramu
		-- (12,221) -- Errtel of Anger
		-- (12,231) -- Errtel of Blessing
		-- (12,241) -- Errtel of Integrity
		-- (12,251) -- Errtel of Divinity
		-- (12,261) -- Errtel of Gale

	-- Protection against specified items which should not come with extra options

	if ItemID == MakeItemID(12,15) -- Jewel of Chaos
	or ItemID == MakeItemID(14,13) -- Jewel of Bless
	or ItemID == MakeItemID(14,14) -- Jewel of Soul
	or ItemID == MakeItemID(14,16) -- Jewel of Life
	or ItemID == MakeItemID(14,22) -- Jewel of Creation
	then
		ItemLevel = 0
		IsSkill = 0
		IsLuck = 0
		IsOption = 0
		IsExc = 0
		IsAncient = 0
		IsSocket = 0
		IsElemental = 0
	end

		-- Protection against elemental setting value to unsupported items

	if (IsElementalItem(ItemID) == false) then -- if item not elemental then set elemental to 0
		IsElemental = 0
	elseif (IsElementalItem(ItemID) == true and IsElemental == 0) then -- if elemental item and no attribute set
		IsElemental = GetRandomValue(6) -- make a draw, 0-5
			if (IsElemental == 0) then -- if 0 then
				IsElemental = 1 -- set attribute 1
			end
	end
	
	if (ItemID == MakeItemID(12,200) or ItemID == MakeItemID(12,201) and IsSocket == 0) then
		IsSocket = GetRandomValue(6) -- empty slots 0-5
			if (IsSocket == 0) then
				IsSocket = 1
			end
	end
	
	-- If Errtel then hang execution of the script (Errtels cannot be dropped at present using ItemBags)
	
	if ItemID == MakeItemID(12,221) -- Errtel of Anger
	or ItemID == MakeItemID(12,231) -- Errtel of Blessing
	or ItemID == MakeItemID(12,241) -- Errtel of Integrity
	or ItemID == MakeItemID(12,251) -- Errtel of Divinity
	or ItemID == MakeItemID(12,261) -- Errtel of Gale
	then
		LogAdd(string.format('Errtel drop attempt from ItemBag. Drop not supported, item removed, ID: %d', ItemID))
		return
	end

	-- Protection against socket items configured with no sockets
	
	if (IsSocketItem(ItemID) == true and IsSocket == 0) then
		IsSocket = 1 -- set to one socket only
	end

	CreateItem(MonsterIndex, MapNumber, MonsterX, MonsterY, ItemID, ItemLevel, 0, IsSkill, IsLuck, IsOption, PlayerIndex, IsExc, IsAncient, 0, IsSocket, IsElemental)
	return 1
end


-- ### /4/ Create Item (using Event Bag Structure) - Mix/Inventory - LuckyCoin, CherryBlossom, LordMix ### --

function EventBagMakeItem()
	local ItemID = MakeItemID(ItemInfo.ItemType, ItemInfo.ItemIndex)
	local ItemCheck = IsItem(ItemID);

	if ItemCheck == false then
		LogAdd(string.format('Wrong Item In Bag (ItemID: %d)', ItemID))
		return 0
	end

	local ItemLevel = GetBagItemLevel(ItemInfo.ItemMinLevel, ItemInfo.ItemMaxLevel)
	local IsSkill = 0
	local IsLuck = 0
	local IsOption = 0
	local IsExc = 0
	local IsAncient = 0
	local IsSocket = 0
	local IsElemental = 0	-- Always 0 if running files as S6E3

		if (ItemInfo.Skill == 1) then -- Skill Always
			IsSkill = 1
		elseif (ItemInfo.Skill == -1) then -- Random, 50% chance for Skill
			IsSkill = GetRandomValue(2)
		else -- No Skill (protection against unsupported values)				
			IsSkill = 0
		end


		if (ItemInfo.Luck == 1) then -- Luck Always
			IsLuck = 1
		elseif (ItemInfo.Luck == -1) then -- Random, 50% chance for Luck
			IsLuck = GetRandomValue(2)
		else -- no Luck (protection against unsupported values)
			IsLuck = 0
		end


		if (ItemInfo.Option == -1) then -- Random Option
			if (GetRandomValue(3) >= 1) then -- 33% chance to get option, if greater than or equal 1 then
				IsOption = GetRandomValue(8) -- +0 up to +28
			end	
		elseif (ItemInfo.Option > 0 and ItemInfo.Option <= 7) then -- options +4 (1) to +28 (7)
			IsOption = ItemInfo.Option
		else -- no option
			IsOption = 0
		end


		if (ItemInfo.Exc > 0) then -- sets item with options of configured exc mask
			IsExc = ItemInfo.Exc
		elseif (ItemInfo.Exc == -1) then -- random exc option(s)
			IsExc = GetExcellentOpt()
		elseif (ItemInfo.Exc == -2) then -- Original setting for Lord Mix
				IsExc = MakeExcOptForLordMix() -- random exc option, up to 5
				IsSkill = 1 -- +Skill
			if (GetRandomValue(100) < 20) then -- drawn value from range, 20% chance
				IsLuck = 1 -- then get Luck
			else
				IsLuck = 0 -- otherwise, no luck
			end
		else
			IsExc = 0
		end


		if (ItemInfo.Anc == 1) then -- Says item must be ancient (must be configured as possible ancient)
			IsAncient = GetAncientOpt(ItemID)
		end


		-- Item must be of Type 3 is item list settings

		if (IsSocketItem(ItemID) == true) then
			if (ItemInfo.Socket > 0 and ItemInfo.Socket <= 5) then -- 0-5 socket holes
				IsSocket = GetRandomValue(ItemInfo.Socket)+1
			end
		else
			IsSocket = 0 -- no socket, applies for items of no item type 3 only
		end


		-- Always 0 for S6E3

		if (IsElementalItem(ItemID) == true) then
			if (ItemInfo.Elemental > 0 and ItemInfo.Elemental <= 5) then
				IsElemental = ItemInfo.Elemental -- Attributes selection
			elseif (ItemInfo.Elemental == -1) then -- random attribute
				IsElemental = GetRandomValue(6) -- 0-5
			end
		else
			IsElemental = 0 -- no elemental attributes, applies for non elemental items only
		end

		-- ### Elemental Items ###
		-- (12,144) -- Mithril Fragment
		-- (12,145) -- Mithril
		-- (12,148) -- Mithril Fragment Bunch
		-- (12,149) -- Elixir Fragment Bunch
		-- (12,200) -- Muren's Book of Magic
		-- (12,201) -- Scroll of Etramu
		-- (12,221) -- Errtel of Anger
		-- (12,231) -- Errtel of Blessing
		-- (12,241) -- Errtel of Integrity
		-- (12,251) -- Errtel of Divinity
		-- (12,261) -- Errtel of Gale

	-- Protection against specified items which should not come with extra options

	if ItemID == MakeItemID(12,15) -- Jewel of Chaos
	or ItemID == MakeItemID(14,13) -- Jewel of Bless
	or ItemID == MakeItemID(14,14) -- Jewel of Soul
	or ItemID == MakeItemID(14,16) -- Jewel of Life
	or ItemID == MakeItemID(14,22) -- Jewel of Creation
	then
		ItemLevel = 0
		IsSkill = 0
		IsLuck = 0
		IsOption = 0
		IsExc = 0
		IsAncient = 0
		IsSocket = 0
		IsElemental = 0
	end

	-- Protection against elemental setting value to unsupported items

	if (IsElementalItem(ItemID) == false) then -- if item not elemental then set elemental to 0
		IsElemental = 0
	elseif (IsElementalItem(ItemID) == true and IsElemental == 0) then -- if elemental item and no attribute set
		IsElemental = GetRandomValue(6) -- make a draw, 0-5
			if (IsElemental == 0) then -- if 0 then
				IsElemental = 1 -- set attribute 1
			end
	end
	
	if (ItemID == MakeItemID(12,200) or ItemID == MakeItemID(12,201) and IsSocket == 0) then
		IsSocket = GetRandomValue(6) -- empty slots 0-5
			if (IsSocket == 0) then
				IsSocket = 1
			end
	end
	
	-- If Errtel then hang execution of the script (Errtels cannot be dropped at present using ItemBags)
	
	if ItemID == MakeItemID(12,221) -- Errtel of Anger
	or ItemID == MakeItemID(12,231) -- Errtel of Blessing
	or ItemID == MakeItemID(12,241) -- Errtel of Integrity
	or ItemID == MakeItemID(12,251) -- Errtel of Divinity
	or ItemID == MakeItemID(12,261) -- Errtel of Gale
	then
		LogAdd(string.format('Errtel drop attempt from ItemBag. Drop not supported, item removed, ID: %d', ItemID))
		return
	end
	

	-- Protection against socket items configured with no sockets

	if (IsSocketItem(ItemID) == true and IsSocket == 0) then
		IsSocket = 1 -- set to one socket only
	end
	
	return ItemLevel, IsSkill, IsLuck, IsOption, IsExc, IsAncient, IsElemental, IsSocket
end