Imports System.Data.OleDb
Public Class frmEditMember
    Private STUDENTNUMB As Integer

    Private Sub StartForm()
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]where vAdultChild ='" & Adult & "'  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            TextBox2.Text = ""
            TextBox3.Text = ""

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()


            STUDENTNUMB = rowme
            Me.Label5.Text = STUDENTNUMB
            Me.Label6.Text = ""
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")






                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()

            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub gTchurch()
        Try
            Call conns()
            'Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]   "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()


            STUDENTNUMB = rowme
            Me.Label7.Text = STUDENTNUMB
            Me.Label6.Text = ""

        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub combolst()
        Try

            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church] where vAdultChild ='" & Adult & "'  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()
            If rows <> 0 Then


                Call conns()
                'ComboBox1.Enabled = False

                ComboBox1.Items.Clear()
                ComboBox1.Text = ""






                str_sql_user_select = "SELECT DISTINCT(vState)AS [RecordYear]  FROM Church where vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                ro = 0
                'While myreader.Read()
                While myAccessReader.Read()

                    ComboBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                'mycon.Close()
                ' myreader.Close()
                myAccessReader.Close()
                strconss.Close()


                Call conns()
                'ComboBox1.Enabled = False

                ComboBox2.Items.Clear()
                ComboBox2.Text = ""

                str_sql_user_select = "SELECT DISTINCT(vProfesion)AS [RecordYear]  FROM Church  where vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                'Dim ro As Integer = 0
                'While myreader.Read()
                ro = 0
                While myAccessReader.Read()

                    ComboBox2.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                'mycon.Close()
                ' myreader.Close()
                myAccessReader.Close()
                strconss.Close()


                Call conns()
                ComboBox3.Items.Clear()
                TextBox1.Items.Clear()
                TextBox1.Text = ""

                ' str_sql_user_select = "SELECT DISTINCT(vSection)AS [RecordYear]  FROM student "
                str_sql_user_select = "SELECT  DISTINCT(vLocation)AS [RecordYear]FROM Church  where vAdultChild ='" & Adult & "' "



                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                'Dim ro As Integer = 0
                'While myreader.Read()
                While myAccessReader.Read()

                    ComboBox3.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1
                    ross += 1
                End While
                'myreader.Close()
                'mycon.Close()

                myAccessReader.Close()
                strconss.Close()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub frmEditMember_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load


        Try
            Dim ross As Integer = 0
            Me.Height = 540
            Me.Width = 994
            Me.Left = 0
            Me.Top = 100
            'Me.ComboBox2.Enabled = False

            Me.MdiParent = mdiChurch
            Call gTchurch()
            Call StartForm()
            Call combolst()


           
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub QueryClass()
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]  where vLocation ='" & ComboBox3.Text & "' and vBus_Stop ='" & TextBox1.Text & "' and vAdultChild ='" & Adult & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()


            STUDENTNUMB = rowme
            Me.Label6.Text = STUDENTNUMB
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vLocation ='" & ComboBox3.Text & "' and vBus_Stop ='" & TextBox1.Text & "'and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")





                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()




                ComboBox2.Text = ""
                ComboBox1.Text = ""

                TextBox2.Text = ""
                TextBox3.Text = ""

            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub TextBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox1.SelectedIndexChanged
        Call QueryClass()
        
    End Sub

    Private Sub ComboBox2_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox2.SelectedIndexChanged
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]  where vProfesion ='" & ComboBox2.Text & "'and vAdultChild ='" & Adult & "'  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()

            Me.Label6.Text = ""
            'STUDENTNUMB = rowme
            'Me.Label5.Text = STUDENTNUMB

            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vProfesion ='" & ComboBox2.Text & "' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")






                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()



                Call conns()
                'ComboBox1.Enabled = False
                TextBox2.Text = ""
                TextBox3.Text = ""

                ComboBox3.Text = ""
                ComboBox1.Text = ""
                TextBox1.Text = ""
                TextBox1.Items.Clear()
            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox1_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox1.SelectedIndexChanged
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]  where vState ='" & ComboBox1.Text & "' and  vAdultChild ='" & Adult & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()

            Me.Label6.Text = ""
            ' STUDENTNUMB = rowme
            'Me.Label5.Text = STUDENTNUMB
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vState ='" & ComboBox1.Text & "' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")






                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()



                Call conns()
                'ComboBox1.Enabled = False

                TextBox2.Text = ""
                TextBox3.Text = ""

                ComboBox3.Text = ""
                ComboBox2.Text = ""
                TextBox1.Text = ""
                TextBox1.Items.Clear()
            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub
    Private Sub requery()

        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]  where vLocation ='" & ComboBox3.Text & "' and vAdultChild ='" & Adult & "' "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()


            STUDENTNUMB = rowme
            Me.Label6.Text = STUDENTNUMB
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vLocation ='" & ComboBox3.Text & "' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")






                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()



                Call conns()
                'ComboBox1.Enabled = False


                ComboBox2.Text = ""
                ComboBox1.Text = ""
                TextBox2.Text = ""
                TextBox3.Text = ""
                TextBox1.Items.Clear()
                TextBox1.Text = ""
                str_sql_user_select = "SELECT DISTINCT(vBus_Stop)AS [RecordYear]  FROM Church where vLocation ='" & ComboBox3.Text & "' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()


                'Dim ro As Integer = 0
                'While myreader.Read()
                ro = 0
                While myAccessReader.Read()

                    TextBox1.Items.Add(myAccessReader(Trim("RecordYear") & ""))

                    ro += 1

                End While
                'mycon.Close()
                ' myreader.Close()
                myAccessReader.Close()
                strconss.Close()

            End If

            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub ComboBox3_SelectedIndexChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles ComboBox3.SelectedIndexChanged
        Call requery()
    End Sub

    Private Sub CheckBox1_CheckedChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles CheckBox1.CheckedChanged
        Call StartForm()
        Call gTchurch()

        Call combolst()
        ComboBox1.Text = ""
        ComboBox3.Text = ""
        ComboBox2.Text = ""
        TextBox1.Text = ""
        TextBox1.Items.Clear()
        CheckBox1.Checked = False
    End Sub

    Private Sub butExit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butExit.Click
        Me.Close()
    End Sub

    Private Sub TextBox2_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox2.KeyUp
        'vSurname  like '" & TextBox2.Text & "%'


        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]   "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()


            STUDENTNUMB = rowme
            Me.Label7.Text = STUDENTNUMB
            Me.Label6.Text = ""
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vSurname  like '" & TextBox2.Text & "%' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")





                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()



                Call conns()
                'ComboBox1.Enabled = False


                ComboBox3.Text = ""
                ComboBox1.Text = ""
                ComboBox2.Text = ""
                TextBox1.Text = ""
                TextBox3.Text = ""
                TextBox1.Items.Clear()
            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox2_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox2.TextChanged

    End Sub

    Private Sub TextBox3_KeyUp(ByVal sender As Object, ByVal e As System.Windows.Forms.KeyEventArgs) Handles TextBox3.KeyUp
        Try
            Call conns()
            Dim ro As Integer
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church]  "
            'str_sql_user_select = "SELECT * FROM Salary where vEmpid= '" & Trim(TextBox16.Text) & "" & "'"
            Dim rows As Integer
            Dim rowme As String = ""
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()



            'While myreader.Read
            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
                rowme = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()

            myAccessReader.Close()
            strconss.Close()

            Me.Label6.Text = ""
            STUDENTNUMB = rowme
            Me.Label7.Text = STUDENTNUMB
            If rows <> 0 Then
                dtptEdit.Rows.Clear()

                Call conns()
                ro = 0
                str_sql_user_select = "SELECT * FROM Church where vFName  like '" & TextBox3.Text & "%' and vAdultChild ='" & Adult & "' "


                'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                dtptEdit.Rows.Add(rows)

                'While myreader.Read()

                While myAccessReader.Read()
                    'reading from the datareader
                    dtptEdit.Rows(ro).Cells(0).Value = myAccessReader("vMemberId")
                    dtptEdit.Rows(ro).Cells(1).Value = myAccessReader("vSurname")
                    dtptEdit.Rows(ro).Cells(2).Value = myAccessReader("vfName")
                    dtptEdit.Rows(ro).Cells(3).Value = myAccessReader("vMidName")
                    dtptEdit.Rows(ro).Cells(4).Value = myAccessReader("vEmail")
                    dtptEdit.Rows(ro).Cells(5).Value = myAccessReader("vMobile")
                    dtptEdit.Rows(ro).Cells(6).Value = myAccessReader("vGender")
                    dtptEdit.Rows(ro).Cells(7).Value = myAccessReader("vAddress")
                    dtptEdit.Rows(ro).Cells(8).Value = myAccessReader("vState")
                    dtptEdit.Rows(ro).Cells(9).Value = myAccessReader("vLocation")
                    dtptEdit.Rows(ro).Cells(10).Value = myAccessReader("vBus_Stop")
                    dtptEdit.Rows(ro).Cells(11).Value = myAccessReader("vProfesion")
                    dtptEdit.Rows(ro).Cells(12).Value = myAccessReader("vNoOfDpt")
                    dtptEdit.Rows(ro).Cells(13).Value = myAccessReader("vHPhone")
                    dtptEdit.Rows(ro).Cells(14).Value = myAccessReader("vAddresDec")
                    dtptEdit.Rows(ro).Cells(15).Value = myAccessReader("vAdultChild")
                    dtptEdit.Rows(ro).Cells(16).Value = myAccessReader("dbirthdate")
                    dtptEdit.Rows(ro).Cells(17).Value = myAccessReader("dDate")

                    dtptEdit.Rows(ro).Cells(18).Value = myAccessReader("id")






                    ro += 1

                    'End If
                End While
                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()



                'Call conns()
                'ComboBox1.Enabled = False


                ComboBox3.Text = ""
                ComboBox1.Text = ""
                ComboBox2.Text = ""
                TextBox1.Text = ""
                TextBox2.Text = ""
                TextBox1.Items.Clear()
            End If


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub TextBox3_TextChanged(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles TextBox3.TextChanged

    End Sub

    Private ross As Integer
    Private Sub butEdit_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butEdit.Click
        Try
            Call conns()
            Dim ro As Integer = 0
            Dim rows As Integer = 0
            Dim code As String = ""
            ro = 0
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church] where  vAdultChild ='" & Adult & "' "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            'myreader = comUserSelect.ExecuteReader()
            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()


            While myAccessReader.Read
                rows = myAccessReader("RecordCount")
            End While
            myAccessReader.Close()
            code = dtptEdit.Rows(ro).Cells(0).Value
            While rows > ro
                'While ross <> ro
                If stid = code Then
                    For i As Integer = 0 To dtptEdit.RowCount - 1


                        Dim sqlString As String
                        sqlString = "UPDATE  [Church] SET " & _
                                "vSurname='" & dtptEdit.Rows(ro).Cells(1).Value & "'," & _
                                "vfName='" & dtptEdit.Rows(ro).Cells(2).Value & "'," & _
                                "vMidName='" & dtptEdit.Rows(ro).Cells(3).Value & "'," & _
                                "vEmail='" & dtptEdit.Rows(ro).Cells(4).Value & "'," & _
                                 "vMobile='" & dtptEdit.Rows(ro).Cells(5).Value & "'," & _
                                "vGender='" & dtptEdit.Rows(ro).Cells(6).Value & "'," & _
                                "vAddress='" & dtptEdit.Rows(ro).Cells(7).Value & "'," & _
                                 "vState='" & dtptEdit.Rows(ro).Cells(8).Value & "'," & _
                                "vLocation='" & dtptEdit.Rows(ro).Cells(9).Value & "'," & _
                                "vBus_Stop='" & dtptEdit.Rows(ro).Cells(10).Value & "'," & _
                                "vProfesion='" & dtptEdit.Rows(ro).Cells(11).Value & "'," & _
                                "vNoOfDpt='" & dtptEdit.Rows(ro).Cells(12).Value & "'," & _
                                "vHPhone='" & dtptEdit.Rows(ro).Cells(13).Value & "'," & _
                                "vAddresDec='" & dtptEdit.Rows(ro).Cells(14).Value & "'," & _
                                 "vAdultChild='" & dtptEdit.Rows(ro).Cells(15).Value & "'," & _
                                "dbirthdate='" & dtptEdit.Rows(ro).Cells(16).Value & "'," & _
                                "dDate='" & dtptEdit.Rows(ro).Cells(17).Value & "'" & _
                                "where vMemberId ='" & stid.Trim & "'  and Id =" & id & ""

                        'comUserSelect = New SqlCommand(sqlString, mycon)
                        'comUserSelect.ExecuteNonQuery()

                        comUserSelectS = New OleDbCommand(sqlString, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        'reading from the datareader
                



                    Next i

                    MsgBox("Data has been Edited", MsgBoxStyle.DefaultButton1, "Edit")

                    myAccessReader.Close()
                    strconss.Close()

                    If ComboBox3.Text <> "" And TextBox1.Text = "" Then
                        requery()
                        'query()
                    End If
                    If TextBox1.Text <> "" And ComboBox3.Text <> "" Then
                        QueryClass()

                    End If

                    If TextBox1.Text = "" And ComboBox1.Text = "" Then

                        StartForm()
                    End If

                    Exit Sub
                End If
                ro += 1
                code = dtptEdit.Rows(ro).Cells(0).Value
                ' ross += 1
            End While


            'myAccessReader.Close()
            'strconss.Close()


            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try


    End Sub
    Private stid As String
    Private id As Integer
    Private code As String
    Private classs As String
    Private Sub dtptEdit_CellDoubleClick(ByVal sender As Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellDoubleClick
        stid = ""
        stid = dtptEdit.CurrentRow.Cells(0).Value()
        id = 0
        id = CInt(dtptEdit.CurrentRow.Cells(18).Value())
        code = dtptEdit.CurrentRow.Cells(18).Value()
        classs = dtptEdit.CurrentRow.Cells(5).Value()
    End Sub
    Private Sub dtptEdit_DoubleClick(ByVal sender As Object, ByVal e As System.EventArgs) Handles dtptEdit.DoubleClick
        stid = ""
        stid = dtptEdit.CurrentRow.Cells(0).Value()
        id = 0
        id = CInt(dtptEdit.CurrentRow.Cells(18).Value())
        code = dtptEdit.CurrentRow.Cells(18).Value()
        classs = dtptEdit.CurrentRow.Cells(5).Value()
    End Sub

    Private Sub butDel_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butDel.Click
        Try
            Dim Choice As String
            Choice = MsgBox("Are you sure you want to Delete Member?", vbYesNo + vbInformation, "Delete")
            If Choice = vbYes Then
                Call conns()
                str_sql_user_select = "Delete from [Church] where vMemberId='" & stid & "'"

                ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                MsgBox("Data has been Deleted", MsgBoxStyle.DefaultButton1, "Information")


                'myreader.Close()

                'mycon.Close()
                myAccessReader.Close()
                strconss.Close()
                Call StartForm()
            End If
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

   

    Private printNo As Integer
    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        printNo = 0

        
        PrintPreviewDialog1.Width = 1500
        PrintPreviewDialog1.Height = 1200
        PrintPreviewDialog1.AutoSizeMode = False
        PrintPreviewDialog1.PrintPreviewControl.AutoZoom = True


        lst()
        PrintBIll()
        If PrintPreviewDialog1.Created = False Then
            code = ""
        End If
        intJoe = 0
    End Sub
    Private numb As Integer
    Private X1 As Integer
    Private X2 As Integer
    Private W2 As Integer
    Private W1 As Integer
    Private W3 As Integer
    Private X3 As Integer

    Public Sub PrintBIll()
        ' Dim Y As Integer


        Dim PSize As Integer = ListItems.Items.Count
        'Dim PSize As Integer = numb
        Dim PHi As Double

        With PrintDocument1.DefaultPageSettings
            Dim Ps As Printing.PaperSize
            PHi = PSize * 20 + 350
            Ps = New Printing.PaperSize("Student Details", 800, 1000)
            .Margins.Top = 15
            .Margins.Bottom = 20
            .PaperSize = Ps
        End With

        headfont = New Font("Courier New", 16, FontStyle.Bold)
        tablefont = New Font("Times New Roman", 8, FontStyle.Bold)
        titlefont = New Font("Times New Roman", 8)
        X1 = PrintDocument1.DefaultPageSettings.Margins.Left
        'X1 = X1 + 10
        Dim pageWidth As Integer

        With PrintDocument1.DefaultPageSettings
            pageWidth = .PaperSize.Width - .Margins.Left - .Margins.Right
        End With

        X2 = X1 + 120
        X3 = X2 + pageWidth * 0.5
        W1 = X2 - X1
        W2 = X3 - X2
        W3 = pageWidth - X3

        If printNo = 0 Then
            PrintPreviewDialog1.Document = PrintDocument1
            PrintPreviewDialog1.ShowDialog()
        End If
        If printNo = 1 Then
            PrintDocument1.PrintController = New Printing.StandardPrintController
            PrintDocument1.Print()
        End If



    End Sub
    Private headfont As New Font("Arial", 14)
    Private tablefont As New Font("Arial", 9)
    Private titlefont As New Font("Times New Roman", 9)
    Private itm As Integer
    Private str As String
    Private Y As Integer
    ' Dim X1 As Integer
    'Dim X2 As Integer
    'Dim W2 As Integer
    ' Private str As String

    Private Yc As Integer
    Private ctr_pay As Integer
    Private counts_pay As Integer
    Private count_pay As Integer
    Private numbs_pay As Integer
    Private array_STId(array_STId1) As String
    Private nos As Integer
    Private array_STId1 As Integer

    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs) Handles PrintDocument1.PrintPage
        Try
            Dim ro As Integer = 0
            Dim lines, Cols As Integer
            str = ""
            Yc = 0
            lines = 0
            Cols = 0

            ListItems.Text = numb
            Y = PrintDocument1.DefaultPageSettings.Margins.Top + 1






            Dim rowsOrder As Integer = 0

            Dim studentid As String = ""
            If code = "" And TextBox1.Text = "" And ComboBox3.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Church where vLocation = '" & ComboBox3.Text.Trim & "'" & " and vAdultChild ='" & Adult & "'"
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                'mycon.Close()
                strconss.Close()


                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   Church where vLocation = '" & ComboBox3.Text.Trim & "'" & " and vAdultChild ='" & Adult & "'"

                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    ' myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()

                End If

            End If

            If code = "" And TextBox1.Text <> "" And ComboBox3.Text <> "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Church where vLocation = '" & ComboBox3.Text.Trim & "'" & " and vBus_Stop ='" & TextBox1.Text & "' and vAdultChild ='" & Adult & "'"
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                ' mycon.Close()
                strconss.Close()


                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   Church where vLocation = '" & ComboBox3.Text.Trim & "'" & "and vBus_Stop ='" & TextBox1.Text & "' and vAdultChild ='" & Adult & "'"

                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()
                End If

            End If


            If code = "" And TextBox1.Text = "" And ComboBox1.Text <> "" And ComboBox2.Text = "" And ComboBox3.Text = "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Church where vState = '" & ComboBox1.Text.Trim & "'" & " and vAdultChild ='" & Adult & "'"
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                'mycon.Close()
                strconss.Close()


                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   Church where vState = '" & ComboBox1.Text.Trim & "'" & " and vAdultChild ='" & Adult & "'"

                    'comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()

                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()

                End If

            End If


            If code = "" And TextBox1.Text = "" And ComboBox2.Text <> "" And ComboBox1.Text = "" Then

                Call conns()
                str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM   Church where vProfesion = '" & ComboBox2.Text & "' and vAdultChild ='" & Adult & "' "
                'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
                'myreader = comUserSelect.ExecuteReader()

                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()

                'Dim rows As Integer
                While myAccessReader.Read
                    rowsOrder = myAccessReader("RecordCount")
                End While
                myAccessReader.Close()
                array_STId1 = rowsOrder
                array_STId1 -= 1
                ' mycon.Close()
                strconss.Close()


                Dim array_STId2(array_STId1) As String
                Dim array(array_STId1) As String
                Dim stid As String = ""


                '  Dim nam As String

                If numbs_pay = 0 Then
                    Call conns()


                    Me.ListItems.Items.Clear()
                    str_sql_user_select = "SELECT *   FROM   Church where vProfesion = '" & ComboBox2.Text & "' and vAdultChild ='" & Adult & "' "

                    ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                    'myreader = comUserSelect.ExecuteReader()
                    comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                    myAccessReader = comUserSelectS.ExecuteReader()

                    ro = 0
                    While rowsOrder <> ro

                        While myAccessReader.Read()
                            stid = myAccessReader("vMemberId")

                            array_STId2(nos) = stid

                            Me.ListItems.Items.Add(myAccessReader(Trim("vMemberId") & ""))

                            nos += 1
                            ro += 1
                            intJoe = ro
                        End While

                    End While

                    'mycon.Close()
                    strconss.Close()
                End If

            End If



           

            e.Graphics.DrawString(School_name, headfont, Brushes.Black, X1 + 120, Y + 40)

            '  e.Graphics.DrawString("SWEDRU SECONDARY SCHOOL", headfont, Brushes.Black, X1 + 120, Y + 40)
            e.Graphics.DrawString("MEMBER DETAILS", headfont, Brushes.Black, X1 + 120, Y + 70)

            'Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10
            With PrintDocument1.DefaultPageSettings
                e.Graphics.DrawLine(Pens.Black, .Margins.Left, Y + 95, _
                .PaperSize.Width - .Margins.Right, Y + 95)
            End With

            '############# COURSE SELECTION

            If code = "" And TextBox1.Text = "" And ComboBox3.Text <> "" And ComboBox1.Text = "" And ComboBox2.Text = "" Then

                e.Graphics.DrawString("MEMBER ID: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 105), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 110)

                e.Graphics.DrawString("BUS STOP: ", tablefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 110)

                ' e.Graphics.DrawString("DATE: ", tablefont, Brushes.Black, CInt(X1 + 405), CInt(Y) + 110)

                e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0

                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        str_sql_user_select = "SELECT  *  FROM  Church where vLocation = '" & ComboBox3.Text & "' and  vMemberId='" & studentid & "'"





                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMemberId"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 130)



                            'e.Graphics.DrawString(myreader("vset"), titlefont, Brushes.Black, CInt(X1 + 404), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If

            End If



            If code = "" And TextBox1.Text <> "" And ComboBox3.Text <> "" And ComboBox1.Text = "" And ComboBox2.Text = "" Then

                e.Graphics.DrawString("MEMBER ID: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 105), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 110)

                e.Graphics.DrawString("BUS STOP: ", tablefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 110)

                ' e.Graphics.DrawString("DATE: ", tablefont, Brushes.Black, CInt(X1 + 405), CInt(Y) + 110)

                e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0

                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        str_sql_user_select = "SELECT  *  FROM  Church where vLocation = '" & ComboBox3.Text & "' and  vMemberId='" & studentid & "' and vBus_Stop ='" & TextBox1.Text & "'"




                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMemberId"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 130)



                            'e.Graphics.DrawString(myreader("vset"), titlefont, Brushes.Black, CInt(X1 + 404), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If

            End If



            If code = "" And TextBox1.Text = "" And ComboBox1.Text <> "" And ComboBox3.Text = "" And ComboBox2.Text = "" Then

                e.Graphics.DrawString("MEMBER ID: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 105), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 110)

                e.Graphics.DrawString("BUS STOP: ", tablefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 110)

                ' e.Graphics.DrawString("DATE: ", tablefont, Brushes.Black, CInt(X1 + 405), CInt(Y) + 110)

                e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0
                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        str_sql_user_select = "SELECT  * FROM  Church where vState = '" & ComboBox1.Text & "' and  vMemberId='" & studentid & "'  "





                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMemberId"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 130)



                            'e.Graphics.DrawString(myreader("vset"), titlefont, Brushes.Black, CInt(X1 + 404), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)



                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If

            End If


            '#################         Class Selection

            If code = "" And TextBox1.Text = "" And ComboBox1.Text = "" And ComboBox2.Text <> "" And ComboBox3.Text = "" Then
                e.Graphics.DrawString("MEMBER ID: ", tablefont, Brushes.Black, CInt(X1 + 25), CInt(Y) + 110)

                e.Graphics.DrawString("SURNAME: ", tablefont, Brushes.Black, CInt(X1 + 105), CInt(Y) + 110)

                e.Graphics.DrawString("FIRST NAME: ", tablefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 110)

                e.Graphics.DrawString("PHONE No: ", tablefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 110)

                e.Graphics.DrawString("BUS STOP: ", tablefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 110)

                ' e.Graphics.DrawString("DATE: ", tablefont, Brushes.Black, CInt(X1 + 405), CInt(Y) + 110)

                e.Graphics.DrawString("ADDRESS: ", tablefont, Brushes.Black, CInt(X1 + 450), CInt(Y) + 110)


                While intJoe > 0
                    For Each i As String In Me.ListItems.Items(itm).ToString

                        studentid = Me.ListItems.Items(itm).ToString


                        Call conns()

                        str_sql_user_select = "SELECT  * FROM  Church where vProfesion = '" & ComboBox2.Text.Trim & "'" & " and  vMemberId='" & studentid & "' "









                        'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)

                        'myreader = comUserSelect.ExecuteReader()

                        comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                        myAccessReader = comUserSelectS.ExecuteReader()



                        While myAccessReader.Read
                            numbs_pay += 1
                            intJoe -= 1
                            e.Graphics.DrawString(numbs_pay & "" & ".", tablefont, Brushes.Black, CInt(X1), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMemberId"), titlefont, Brushes.Black, CInt(X1 + 30), CInt(Y) + 130)


                            'e.Graphics.DrawString("DEPARTMENT CODE : ", tablefont, Brushes.Black, CInt(X1) + 380, CInt(Y) + 100)
                            'e.Graphics.DrawString(myreader("vDepartCode"), titlefont, Brushes.Black, CInt(X1) + 550, CInt(Y) + 100)


                            e.Graphics.DrawString(myAccessReader("vSURNAME"), titlefont, Brushes.Black, CInt(X1 + 115), CInt(Y) + 130)


                            e.Graphics.DrawString(myAccessReader("vFName"), titlefont, Brushes.Black, CInt(X1 + 185), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, CInt(X1 + 275), CInt(Y) + 130)





                            e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, CInt(X1 + 351), CInt(Y) + 130)



                            'e.Graphics.DrawString(myreader("vset"), titlefont, Brushes.Black, CInt(X1 + 404), CInt(Y) + 130)

                            e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, CInt(X1 + 460), CInt(Y) + 130)


                            Y += PrintDocument1.DefaultPageSettings.Margins.Top + 5

                            ro += 1

                            count_pay += 1
                            ctr_pay += 1
                            itm += 1

                            If itm = rowsOrder Then
                                itm = 0
                                counts_pay = 0
                                count_pay = 0
                                numbs_pay = 0
                                ctr_pay = 0
                                nos = 0
                                e.HasMorePages = False
                                Exit For
                            End If

                            If count_pay >= 16 Then
                                e.HasMorePages = True
                                counts_pay += count_pay

                                count_pay = 0
                                Exit Sub
                            Else
                                e.HasMorePages = False
                                'counts = 0
                            End If
                            If count_pay = 0 Then
                                e.HasMorePages = False
                            End If



                        End While


                    Next
                End While
                If count_pay <> 16 Then
                    counts_pay = 0
                    count_pay = 0
                    numbs_pay = 0
                    ctr_pay = 0
                    nos = 0
                    itm = 0
                End If

            End If



            

            If code <> "" Then

                Call conns()

                ro = 0
                str_sql_user_select = "SELECT * FROM Church  where  vMemberId ='" & stid & "' and id =" & id & ""


                ' comUserSelect = New SqlCommand(str_sql_user_select, mycon)

                ' myreader = comUserSelect.ExecuteReader()
                comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
                myAccessReader = comUserSelectS.ExecuteReader()



                While myAccessReader.Read()


                    ListItems.Text = numb
                    Y = PrintDocument1.DefaultPageSettings.Margins.Top + 10

                    'e.Graphics.DrawString("STUDENT DETAILS", headfont, Brushes.Black, X1 + 210, Y)

                    e.Graphics.DrawString("SURNAME : ", tablefont, Brushes.Black, X1, Y + 110)
                    e.Graphics.DrawString(myAccessReader("vSurname"), titlefont, Brushes.Black, X1 + 150, Y + 110)

                    e.Graphics.DrawString("FIRST NAME : ", tablefont, Brushes.Black, X1, Y + 150)
                    e.Graphics.DrawString(myAccessReader("vfName"), titlefont, Brushes.Black, X1 + 150, Y + 150)


                    e.Graphics.DrawString("MIDDLE NAME : ", tablefont, Brushes.Black, X1, Y + 190)
                    e.Graphics.DrawString(myAccessReader("vMidName"), titlefont, Brushes.Black, X1 + 150, Y + 190)


                    e.Graphics.DrawString("GENDER : ", tablefont, Brushes.Black, X1, Y + 230)
                    e.Graphics.DrawString(myAccessReader("vGender"), titlefont, Brushes.Black, X1 + 150, Y + 230)

                    e.Graphics.DrawString("ADDRESS : ", tablefont, Brushes.Black, X1, Y + 270)
                    e.Graphics.DrawString(myAccessReader("vAddress"), titlefont, Brushes.Black, X1 + 150, Y + 270)

                    e.Graphics.DrawString("EMAIL : ", tablefont, Brushes.Black, X1, Y + 310)
                    e.Graphics.DrawString(myAccessReader("vEmail"), titlefont, Brushes.Black, X1 + 150, Y + 310)


                    e.Graphics.DrawString("MOBILE PHONE : ", tablefont, Brushes.Black, X1, Y + 350)
                    e.Graphics.DrawString(myAccessReader("vMobile"), titlefont, Brushes.Black, X1 + 150, Y + 350)

                    e.Graphics.DrawString("HOME PHONE: ", tablefont, Brushes.Black, X1, Y + 390)
                    e.Graphics.DrawString(myAccessReader("vHPhone"), titlefont, Brushes.Black, X1 + 150, Y + 390)

                    e.Graphics.DrawString("ADDRESS DESC: ", tablefont, Brushes.Black, X1, Y + 430)
                    e.Graphics.DrawString(myAccessReader("vAddresDec"), titlefont, Brushes.Black, X1 + 150, Y + 430)


                    'e.Graphics.DrawString("ADDRESS DESC : ", tablefont, Brushes.Black, X1, Y + 470)
                    'e.Graphics.DrawString(myAccessReader("vAddresDec"), titlefont, Brushes.Black, X1 + 150, Y + 470)

                    ' e.Graphics.DrawString("Mobile Phone : ", tablefont, Brushes.Black, X1 + 400, Y + 110)
                    'e.Graphics.DrawString(Me.TextBox8.Text, titlefont, Brushes.Black, X1 + 500, Y + 110)


                    'e.Graphics.DrawString("REGISTRATION Date : ", tablefont, Brushes.Black, X1, Y + 80)
                    ' e.Graphics.DrawString(Format(CDate(Me.DateTimePicker2.Text), "dd/MM/yyyy"), titlefont, Brushes.Black, X1 + 150, Y + 80)


                    e.Graphics.DrawString("REGION /STATE : ", tablefont, Brushes.Black, X1 + 350, Y + 110)
                    e.Graphics.DrawString(myAccessReader("vState"), titlefont, Brushes.Black, X1 + 550, Y + 110)

                    e.Graphics.DrawString("NO OF DPT : ", tablefont, Brushes.Black, X1 + 350, Y + 150)
                    e.Graphics.DrawString(myAccessReader("vNoOfDpt"), titlefont, Brushes.Black, X1 + 550, Y + 150)

                    e.Graphics.DrawString(" LOCATION: ", tablefont, Brushes.Black, X1 + 350, Y + 190)
                    e.Graphics.DrawString(myAccessReader("vLocation"), titlefont, Brushes.Black, X1 + 550, Y + 190)

                   
                    e.Graphics.DrawString("PROFESSION: ", tablefont, Brushes.Black, X1 + 350, Y + 230)
                    e.Graphics.DrawString(myAccessReader("vProfesion"), titlefont, Brushes.Black, X1 + 550, Y + 230)

                    e.Graphics.DrawString("DATE OF BIRTH:  ", tablefont, Brushes.Black, X1 + 350, Y + 270)
                    e.Graphics.DrawString(myAccessReader("dbirthdate"), titlefont, Brushes.Black, X1 + 550, Y + 270)


                    e.Graphics.DrawString("REGISTRATION DATE:: ", tablefont, Brushes.Black, X1 + 350, Y + 310)
                    e.Graphics.DrawString(myAccessReader("dDate"), titlefont, Brushes.Black, X1 + 550, Y + 310)

                    e.Graphics.DrawString("BUS STOP: : ", tablefont, Brushes.Black, X1 + 350, Y + 350)
                    e.Graphics.DrawString(myAccessReader("vBus_Stop"), titlefont, Brushes.Black, X1 + 550, Y + 350)

                    'e.Graphics.DrawString("KNOWING US : ", tablefont, Brushes.Black, X1 + 350, Y + 390)
                    'e.Graphics.DrawString(myAccessReader("vHow_Know"), titlefont, Brushes.Black, X1 + 550, Y + 390)

                    'e.Graphics.DrawString("NEXT OF KINDS NAME : ", tablefont, Brushes.Black, X1 + 350, Y + 430)
                    ' e.Graphics.DrawString(myAccessReader("vNear_to_kin"), titlefont, Brushes.Black, X1 + 550, Y + 430)

                    'e.Graphics.DrawString("NEXT OF KINDS ADDRESS : ", tablefont, Brushes.Black, X1 + 350, Y + 470)
                    'e.Graphics.DrawString(myAccessReader("vNear_to_kinAdd"), titlefont, Brushes.Black, X1 + 550, Y + 470)


                    ro += 1

                    'End If
                End While
                'code = ""
                'mycon.Close()
                strconss.Close()
            End If



        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try






    End Sub

    Private Sub lst()
        Try
            Call conns()
            str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Church] "

            ' str_sql_user_select = "SELECT COUNT(*) AS [RecordCount] FROM  [Student] where vstudentid='" & TextBox16.Text & "' "
            'comUserSelect = New SqlClient.SqlCommand(str_sql_user_select, mycon)
            ' myreader = comUserSelect.ExecuteReader()

            comUserSelectS = New OleDbCommand(str_sql_user_select, strconss)
            myAccessReader = comUserSelectS.ExecuteReader()

            'Dim numb As Integer
            While myAccessReader.Read
                numb = myAccessReader("RecordCount")
            End While
            'myreader.Close()
            'mycon.Close()
            myAccessReader.Close()
            strconss.Close()
            Exit Sub
        Catch Exp As OleDb.OleDbException
            MsgBox(Exp.Message, MsgBoxStyle.Exclamation, "Oledb Error")
        Catch Exp As Exception
            MsgBox(Exp.Message, MsgBoxStyle.Information, "General Error")
        End Try
    End Sub

    Private Sub butPrint_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles butPrint.Click
        printNo = 1
        Dim Choices As String = ""
        Choices = MsgBox("Are you sure you want to  Print?", vbYesNo + vbInformation, "Print")

        If Choices = vbYes Then

            


            lst()
            PrintBIll()
            code = ""
        End If
        intJoe = 0
    End Sub
    Private Sub btnReset_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles btnReset.Click
        dtptEdit.Rows.Clear()
        TextBox1.Text = ""
        TextBox2.Text = ""
        TextBox3.Text = ""
        ComboBox1.Text = ""
       
        ComboBox3.Text = ""
    End Sub

    Private Sub PrintPreviewDialog1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles PrintPreviewDialog1.Load

    End Sub

    Private Sub dtptEdit_CellContentClick(ByVal sender As System.Object, ByVal e As System.Windows.Forms.DataGridViewCellEventArgs) Handles dtptEdit.CellContentClick

    End Sub
End Class
